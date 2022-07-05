<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function product(Request $request)
    {
        $products = [];
        if ($request->has('filter') or $request->has('value')) {
            $products = Product::with('user')->orderBy($request->filter, $request->value)->get();
        } else {
            $products = Product::with('user')->get();
        }
        return view('main.product', compact('products'));
    }

    public function productDetail($slug)
    {
        $product = Product::with('user')->where('slug', $slug)->first();
        return view('main.product-detail', compact('product'));
    }
}
