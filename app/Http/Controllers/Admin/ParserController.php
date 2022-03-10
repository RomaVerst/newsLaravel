<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CategoryController;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\News;
use DB;
use DateTime;
use Illuminate\Support\Str;

class ParserController extends Controller
{
    function index(){
        $xml = XmlParser::load('https://lenta.ru/rss');
        $data = $xml->parse([
          'news'=>['uses'=>'channel.item[title,description,link,pubDate,enclosure::url,category]'],
        ]);

    /*    $data = simplexml_load_file('https://lenta.ru/rss');
        dump($data);
        foreach($data->channel->item as $item){
            $news['title'][] = (string)$item->title;
            $news['category'][] = (string)$item->category;
            $news['link'][] = (string)$item->link;
            $news['pubDate'][] = (string)$item->pubDate;
            $news['image'][] = (string)$item->enclosure->attributes()->url;
        }
        dd($news);*/

        $for_db = [];

        foreach($data['news'] as $item){
            if($item['category']){
                $category = Category::query()->firstOrCreate([
                    'title' => $item['category'],
                    'slug' => Str::slug($item['category'])
                ]);
            }
            $date =  new DateTime($item['pubDate']);
            News::query()->firstOrCreate([
                'title' => $item['title'],
                'text' => $item['description'],
                'created_at' => $date->format('Y-m-d H:i:s'),
                'image' => $item['enclosure::url'],
                'link' => $item['link'],
                'category_id' => $category->id,
                'isprivate' => rand(0,1)
            ]);
        }
        return redirect()->route('admin.index')->with('success', 'Новости спарсены!');
    }
}
