<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function loginpost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'อีเมลหรือรหัสผ่านไม่ถูกต้อง',
        ])->onlyInput('email');
    }

    public function registerpost(Request $request)
    {
        $user = new User;
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return to_route('login');
    }

    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
