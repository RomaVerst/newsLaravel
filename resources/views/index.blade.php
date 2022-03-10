@extends('layouts.main')

@section('title')
    @parent Главная
@endsection
@section('menu')
    @include ('menu')
@endsection

@section('title_page')
    Главная
@endsection

@section('content')
    <p>Добро пожаловать!</p>
@endsection