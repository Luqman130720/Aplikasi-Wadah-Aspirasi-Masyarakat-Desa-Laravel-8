<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            if (auth()->user()->role == 1){
                return redirect()->intended('/superadmin');
            }elseif (auth()->user()->role == 2){
                return redirect()->intended('/admin/dashboard');
            }elseif (auth()->user()->role == 3){
                return redirect()->intended('/user/dashboard')->with('message', "your isn't admin");
            }
        }

        return back()->with('LoginError', 'login gagal');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/')->with('LogoutSuccess', 'Anda Telah Logout!');
    }
}
