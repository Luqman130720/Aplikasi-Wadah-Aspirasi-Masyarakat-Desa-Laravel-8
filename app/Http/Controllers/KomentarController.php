<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function post_komentar (Request $request)
    {
        $validateData = $request->validate([
            'user_id'=>'required',
            'parent_id'=>'required',
            'aspirasi_id'=>'required',
            'konten'=>'required',
        ]);

        Komentar::create($validateData);

        return redirect()->back()->with('success', 'komentar berhasil di tambahkan');
    }


    public function DeleteKomentar(Komentar $komentar)
    {
        Komentar::destroy($komentar->id);

        return back()->with('DeleteKomentar', 'Komentar Berhasil Dihapus');
    }
}
