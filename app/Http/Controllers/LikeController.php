<?php

namespace App\Http\Controllers;

use App\Models\Like;

class LikeController extends Controller
{
    public function like ($aspirasi_id)
    {
        $like = Like::where('aspirasi_id', $aspirasi_id)->where('user_id',auth()->user()->id)->first();

        if ($like) {
            $like->delete();
            return back();
        } else {
            Like::create(
                [
                'aspirasi_id' => $aspirasi_id,
                'user_id' => auth()->user()->id
                ]
            );

            return back();
        }
    }
}
