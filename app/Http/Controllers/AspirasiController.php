<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Aspirasi;
use App\Models\Category;
use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AspirasiController extends Controller
{
    public function index(Aspirasi $aspirasi, Category $category)
    {
        return view('/user/dashboard',
        [
            "aspirasi"=>$aspirasi->latest()->get(),
            'category' => $category->all()
        ]);
    }
    
    public function panduan(Aspirasi $aspirasi, Category $category)
    {
        return view('/user/panduan',[
            'category' => $category->all()
        ]);
    }


    public function info(Aspirasi $aspirasi, Category $category)
    {
        return view ('/user/info',[
            'category' => $category->all()
        ]);
    }

    
    public function detail(Aspirasi $aspirasi, Komentar $komentar, Category $category)
    {
        return view('/user/detail',
        [
            "aspirasi"=>$aspirasi,
            "comments" => Komentar::with('user')->where('aspirasi_id',$aspirasi->id)->latest()->get(),
            "replies" => Komentar::with(['user', 'aspirasi'])->get(),
            "like" => Like::where('aspirasi_id', $aspirasi->id)->count(),
            'category' => $category->all(),
        ]);
    }


    public function about(Category $category)
    {
        return view ('/user/about',[
            'category' => $category->all()
        ]);
    }


    public function create()
    {
        $category = Category::all();
        return view('user.create', compact('category'));

    }


    public function store(Request $request)
    {
        // return request();
        $validateData = $request->validate([
            'title'=>'required|max:50',
            'category_id'=>'required',
            'content'=>'required|max:255',
            'image'=>'image|file',
        ]);
        
        if ($request->file('image')){
            $validateData['image']=$request->file('image')->store('aspirasi-image');
        }

        $validateData['user_id'] = auth()->user()->id;

        Aspirasi::create($validateData);
        
        return redirect('/user/dashboard')->with('CreateSuccess', 'Terimakasih atas aspirasi yang telah anda berikan kepada kami');

    }


    public function show(Aspirasi $my_aspirasi, Category $category)
    {
        return view('/user/collection',["aspirasi"=>$my_aspirasi->latest()->get(), 'category' => $category->all()]);
    }


    public function edit(Aspirasi $aspirasi, Category $category)
    {
        return view('/user/update',["aspirasi"=>$aspirasi,
        'category' => $category->all(),
        ]);
    }


    
    public function update(Aspirasi $aspirasi, Request $request)
    {
        $validateData = $request->validate(
            [
                'title'=>'required|max:50',
                'content'=>'required|max:255',
                'image'=>'image|file'
            ]
        );


        if ($request->file('image')) {
            if($aspirasi->image)
            {
                Storage::delete($aspirasi->image);
            }
            
            $validateData['image']=$request->file('image')->store('aspirasi-image');
        }

        Aspirasi::where('id', $aspirasi->id)->update($validateData);

        return redirect('/user/collection')->with('UpdateSuccess', 'Aspirasi berhasil Diupdate!');
    }


    public function destroy(Aspirasi $aspirasi)
    {
        if($aspirasi->image){
            Storage::delete($aspirasi->image);
        }
        
        Aspirasi::destroy($aspirasi->id);

        return back()->with('destroy', 'Aspirasi Berhasil Dihapus');
    }
}
