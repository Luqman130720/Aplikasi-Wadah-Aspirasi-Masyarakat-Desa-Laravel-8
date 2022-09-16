<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:55',
            'username' =>'required|max:55',
            'image'=>'image|file',
            'email' =>'required|email:dns',
            'password' =>'required',
            'role' => 'nullable',
        ]);
        
        if ($request->file('image')) {
            $validated['image']=$request->file('image')->store('users-profil');
        }

        $validated ['password'] = Hash::make ($validated['password']);

        User::create($validated);
        return redirect('/')->with('success', 'Registrasi Telah Berhasil! Silahkan Login');
    }
}
