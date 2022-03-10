@extends('layouts.main')

@section('title')
    @parent {{ $news['title'] }}
@endsection

@section('menu')
    @include ('menu')
@endsection

@if(isset($news))
    @section('title_page')
        {{ $news['title'] }}
    @endsection
    @section('content')
    <div class="card-img" style="background-image: url({{ $news['image'] ?? asset('storage/default.jpg') }})"></div>
        @if (!$news['isprivate'] || Auth::check())
            <p>{{ $news['text'] }}</p>
            <a href="{{ $news['link'] }}" target="blank">Перейти к новости</a>&nbsp;&nbsp;/&nbsp;&nbsp;
        @else
            <p>Эта новость приватна, <a href="{{ route('register') }}">зарегистрируйтесь</a></p>
        @endif
        <a href="../" onclick="javascript:history.back(); return false;">Назад</a>
    @endsection
@else
    @section('title_page')
        Ошибка
    @endsection
    @section('content')
        <i>Такой новости нет</i>
        <a href="../" onclick="javascript:history.back(); return false;">Назад</a>
    @endsection
@endif
