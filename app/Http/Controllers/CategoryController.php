<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showAspirasi (Aspirasi $aspirasi, Category $category)
    {
       return view('user.category',[
            "aspirasi" => Aspirasi::with('category')->latest()->where('category_id', $category->id)->paginate(9),
            'category' => $category->all()
       ]);
    }
}
