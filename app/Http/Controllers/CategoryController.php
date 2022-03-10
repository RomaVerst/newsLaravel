<?php

namespace App\Http\Controllers;
use App\News;
use App\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{

    function category($slug){
        $category =  Category::query()->where('slug', $slug)->first();
        return view('news.category', [
            'category' => $category,
            'news' => News::query()
                ->where('category_id', $category->id)
                ->get()
        ]);
    }
    function category_list(){
        return view('news.category_list')->with('category', Category::query()->get());
    }
}
