<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'isprivate', 'category_id', 'link', 'image'];

    public static function rules(){
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => 'required|min:3',
            'text' => 'required|min:3',
            'image' => 'mimes:jpg,jpeg,webp,bmp,png',
            'category_id' => "required|exists:{$tableNameCategory},id"
        ];
    }
    public static function attrName(){
        return [
            'title' => '"Заголовок новости"',
            'text' => '"Текст новости"',
            'image' => '"Изображение"',
            'category_id' => '"Категория новости"'
        ];
    }
}
