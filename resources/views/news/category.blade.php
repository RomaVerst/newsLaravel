@extends('layouts.main')

@section('title')
    @parent {{ $category->title }}
@endsection

@section('menu')
    @include ('menu')
@endsection

@section('title_page')
    Категория | {{ $category->title }}
@endsection

@section('content')
    @if(!empty($news))
        @foreach($news as $item)
            <a href="{{ route('news_one', $item->id) }}">{{ $item->title }}</a><br>
        @endforeach
    @else
        <p>Таких новостей в данной категории пока нет</p>
    @endif
@endsection