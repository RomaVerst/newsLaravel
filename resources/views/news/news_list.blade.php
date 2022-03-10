@extends('layouts.main')

@section('title')
    @parent Список новостей
@endsection

@section('menu')
    @include ('menu')
@endsection

@section('title_page')
    Список новостей
@endsection

@section('content')
    @foreach($news as $item)
        <h3>{{ $item->title }}</h3>
        <a href="{{ route('news_one', $item) }}">
            <div class="card-img" style="background-image: url({{ $item->image ?? asset('storage/default.jpg') }})"></div>
        </a>
        @if (!$item->isprivate || Auth::check())
            <p>
                {{ mb_substr($item->text, 0, 100) }}...
            </p>
            <a href="{{ route('news_one', $item) }}">
                Читать дальше...
            </a>
            <hr>
        @else
            <p>
                Эта новость приватна, <a href="{{ route('login') }}">авторизуйтесь</a> или <a href="{{ route('register') }}">зарегистрируйтесь</a>
            </p>
            <hr>
        @endif
    @endforeach
    {{ $news->links() }}
@endsection
