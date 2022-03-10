@extends('layouts.main')

@section('title')
    @parent Список категорий новостей
@endsection
@section('menu')
    @include ('menu')
@endsection

@section('title_page')
    Список категорий новостей
@endsection

@section('content')
    @foreach($category as $item)
        <a href="{{ route('category', $item->slug) }}">{{ $item->title }}</a><br>
    @endforeach
@endsection