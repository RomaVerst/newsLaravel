<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\News;
use DB, Storage;

class NewsController extends Controller
{
    function edit(Category $category, News $news){
        return view('admin.addNews', [
            'categories' => $category->all(),
            'news' => $news
        ]);
    }

    function create(Request $request, Category $category, News $news){
        if($request->isMethod('post')){
            $this->saveNews($request, $news);
            return redirect()->route('admin.index')->with('success', 'Новость успешно добавлена!');
        }

        return view('admin.addNews', [
            'categories' => $category->all(),
            'news' => $news
        ]);
    }

    function update(Request $request, News $news){
        $this->saveNews($request, $news);
        return redirect()->route('admin.index')->with('success', 'Новость успешно изменена!');
    }

    function delete(News $news){
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость успешно удалена!');
    }

    private function saveNews($request, $news){
        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/images', $request->file('image'));
            $url = Storage::url($path);
        }
        $news->image = $url;
        $this->validate($request,News::rules(), [], News::attrName());
        $news->fill($request->all());
        $news->save();
    }
}
