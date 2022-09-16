<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\User;
use App\Models\Aspirasi;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(Aspirasi $adm_aspirasi)
    {
        return view('/admin/controller',["aspirasi"=>$adm_aspirasi->latest()->get()]);
    }

    
    public function dashboard(Aspirasi $data_aspirasi)
    {
        return view('/admin/dashboard',["data_aspirasi"=>$data_aspirasi->latest()->get()]);
    }


    public function show(User $user)
    {
        return view('/admin/users',
        [
            "user"=>$user->latest()->get()
        ]);
    }

    public function destroy(Aspirasi $aspirasi)
    {
        if($aspirasi->image){
            Storage::delete($aspirasi->image);
        }
        
        Aspirasi::destroy($aspirasi->id);

        return back()->with('DeleteSuccess', 'Aspirasi Berhasil Dihapus');
    }


    public function edit(Aspirasi $aspirasi)
    {
        return view('/admin/update',["aspirasi"=>$aspirasi]);
    }

    
    public function update(Request $request, Aspirasi $aspirasi)
    {
        $validateData = $request->validate(
            [
                'title'=>'required|max:50',
                'content'=>'required|max:255',
                'image'=>'image|file',

            ]
        );


        if ($request->file('image')) {
            if($aspirasi->image){
                Storage::delete($aspirasi->image);
            }

            $validateData['image']=$request->file('image')->store('aspirasi-image');
        }

        Aspirasi::where('id', $aspirasi->id)->update($validateData);

        return redirect('/admin/controller')->with('UpdateSuccess', 'Aspirasi Berhasil diubah!');
    }


    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title'=>'required|max:50',
            'content'=>'required|max:255',
            'image'=>'image|file',
        ]);
        
        if ($request->file('image')){
            $validateData['image']=$request->file('image')->store('aspirasi-image');
        }

        $validateData['user_id'] = auth()->user()->id;

        Aspirasi::create($validateData);
        
        return redirect('/admin/dashboard')->with('CreateSuccess', 'Aspirasi anda  berhasil di buat ');

    }

    
    public function adm_detail(Aspirasi $aspirasi, Komentar $komentar)
    {
        return view('/admin/detail',
            [
                "aspirasi"=>$aspirasi,
                "comments" => Komentar::with('user')->where('aspirasi_id',$aspirasi->id)->latest()->get(),
                "replies" => Komentar::with(['user', 'aspirasi'])->get(),
                "like" => Like::where('aspirasi_id', $aspirasi->id)->count(),
            ]   
        );
    }

    public function DeleteKomentar(Komentar $komentar)
    {
        Komentar::destroy($komentar->id);

        return back()->with('DeleteKomentar', 'Komentar Berhasil Dihapus');
    }
    
    public function DeleteUser(User $user)
    {
        User::destroy($user->id);

        return back()->with('DeleteUser', 'User Berhasil Dihapus');
    }
}
