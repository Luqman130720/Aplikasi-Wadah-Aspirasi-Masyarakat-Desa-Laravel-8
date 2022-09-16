<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuperAdminController extends Controller
{
    public function show(User $user)
    {
        return view('/SuperAdmin/SuperAdmin',
        [
            "user"=>$user->latest()->get()
        ]);
    }

    public function edit(User $user)
    {
        return view('/SuperAdmin/FormEditUser',["user"=>$user]);
    }
     public function update(User $user, Request $request)
    {
        // return request();
        $validateData = $request->validate(
            [
                'name'=>'required|max:50',
                'username'=>'required|max:255',
                'email'=>'required|max:255',
                'password'=>'required|max:255',
                'image'=>'image|file',
                'role'=>'required'
            ]
        );


        if ($request->file('image')) {
            if($user->image)
            {
                Storage::delete($user->image);
            }
            
            $validateData['image']=$request->file('image')->store('user-image');
        }

        User::where('id', $user->id)->update($validateData);

        return redirect('/superadmin')->with('UpdateSuccess', 'User berhasil Diupdate!');
    }
}
