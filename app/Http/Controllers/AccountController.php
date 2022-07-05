<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $products = Product::where('user_id', $user_id)->get();
        $productArrayId = collect($products)->map(function ($item) {
            return $item->id;
        })->toArray();

        $orders = Order::join('products', 'products.id', '=', 'orders.product_id')
            ->select('orders.*', 'products.name', 'products.created_at')
            ->where('orders.user_id', $user_id)
            ->get();

        $sales = Order::join('products', 'products.id', '=', 'orders.product_id')
            ->select('orders.*', 'products.name', 'products.created_at')
            ->whereIn('orders.product_id', $productArrayId)
            ->get();

        $total_purchases = Order::join('products', 'products.id', '=', 'orders.product_id')
            ->select('orders.*', 'products.name', 'products.created_at')
            ->where('orders.user_id', $user_id)
            ->sum('orders.total_price');

        $total_sales = Order::join('products', 'products.id', '=', 'orders.product_id')
            ->select('orders.*', 'products.name', 'products.created_at')
            ->whereIn('orders.product_id', $productArrayId)
            ->sum('orders.total_price');

        return view('main.account', compact('products', 'orders', 'total_purchases', 'total_sales', 'sales'));
    }

    public function productStore(Request $request)
    {
        $data = collect($request->all())->except('_token', 'image')->toArray();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $filename  = pathinfo($imagePath, PATHINFO_FILENAME);
            $extension = pathinfo($imagePath, PATHINFO_EXTENSION);
            $imageName = $filename . '.' . $extension;
            $data = array_merge($data, [
                'path' => $imageName,
                'slug' => Str::slug($data['name']),
                'user_id' => Auth::user()->id
            ]);
        } else {
            notify()->error('gagal upload gambar. ulangi kembali');
        }
        Product::create($data);
        notify()->success('berhasil menambahkan data');

        return back();
    }

    public function topup(Request $request)
    {
        $user = Auth::user();
        $sum = $request->nominal + $user->balance;
        try {
            User::where('id', $user->id)->update(['balance' => $sum]);
            notify()->success('berhasil menambahkan saldo');
        } catch (Exception $e) {
            notify()->error('gagal menambahkan saldo');
        }
        return back();
    }

    public function withdraw(Request $request)
    {
        $user = Auth::user();
        $sum = $user->balance - $request->nominal;
        if ($user->balance < $request->nominal) {
            notify()->error('penarikan uang tidak boleh melebihi saldo. batas maksimal Rp. ' . $user->balance);
            return back();
        }

        try {
            User::where('id', $user->id)->update(['balance' => $sum]);
            notify()->success('berhasil menarik saldo');
        } catch (Exception $e) {
            notify()->error('gagal menarik saldo');
        }
        return back();
    }

    public function buy(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            notify()->warning('silakan login terlebih dahulu sebelum melakukan pembelian barang');
            return redirect()->route('login.view');
        }
        $product = Product::find($request->product_id);
        $owner =  User::where('id', $product->user_id)->first();
        $balance_left = $user->balance - ($request->quantity * $product->price);
        $product_amount_left = $product->amount - $request->quantity;
        if ($user->id ==  $product->user_id) {
            notify()->warning('anda tidak dapat membeli barang anda sendiri');
            return back();
        }
        if ($balance_left < 0) {
            notify()->error('saldo tidak cukup');
            return back();
        }
        if ($product->amount <= 0) {
            notify()->error('barang tidak tersedia');
            return back();
        }

        if ($product->amount < $request->quantity) {
            notify()->error('tidak bisa membeli barang lebih dari ketersediaan');
            return back();
        }
        try {
            DB::beginTransaction();
            User::where('id', $user->id)->update(['balance' => $balance_left]);
            User::where('id', $product->user_id)->update(['balance' => $owner->balance + ($request->quantity * $product->price)]);
            Product::where('id', $product->id)->update(['amount' => $product_amount_left]);
            Order::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
                'amount' => $request->quantity,
                'total_price' => ($request->quantity * $product->price)
            ]);
            notify()->success('berhasil membeli barang');
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            notify()->error('sistem membeli barang saldo');
        }
        return back();
    }
}
