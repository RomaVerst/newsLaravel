<?php

namespace App\Http\Controllers;
use App\News;
use App\Category;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    function index(){
        $news = News::query()->paginate(5);
        return view('news.news_list')->with('news',$news);
    }

    function show(News $news){
        return view('news.news_item')->with('news',$news);
    }
}
