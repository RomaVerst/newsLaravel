<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\News;

class IndexController extends Controller
{
    function index(){
        $news = News::query()->paginate(5);
        return view('admin.index')->with('news',$news);
    }  
}
