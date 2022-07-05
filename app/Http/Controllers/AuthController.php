<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class AuthController extends Controller
{
    public function loginView()
    {
        // dd(Auth::check());
        return view('main.login');
    }

    public function loginAction(Request $request)
    {
        $this->validate($request, [
            'student_id'   => 'required',
            'password' => 'required|min:8'
        ]);
        $user = User::where(['student_id' => $request->student_id])->first();
        $verified = Hash::check($request->password, isset($user->password) ? $user->password : "");
        if ($user && $verified) {
            Auth::login($user);
            notify()->success('Berhasil masuk');
            return redirect()->intended('/');
        }
        notify()->error('Siswa ID atu Passowrd Salah');
        return back();
    }

    public function registerView()
    {
        return view('main.register');
    }

    public function registerAction(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'student_id' => 'required|unique:users,student_id',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);
        $studentId = $request->student_id;
        $firstDigit =  array_sum(collect(str_split(substr($studentId, 0, 3)))->map(function ($data) {
            return (int)$data;
        })->toArray());
        $lastDigit = (int)substr($studentId, 3, 5);
        if ($firstDigit != $lastDigit) {
            return back()->withErrors([
                'student_id' => 'Format ID Siswa Salah. Silakan baca ketentuan',
            ]);
        }
        $data = collect($request->all())->except('_token', 'password_confirm')->toArray();
        User::create($data);
        notify()->success('Berhasil membuat user');
        return back()->with('success', 'berhasil membuat akun siswa kantin kejujuran');
    }

    public function logout()
    {
        Auth::logout();
        notify()->success('Berhasil logout');
        return redirect()->intended('/');
    }
}
