@extends('layouts.main')
@section('title')
    @parent Test2
@endsection
@section('menu')
    @include ('admin.menu')
@endsection

@section('title_page')
    Test2
@endsection

@section('content')
   <p>некий тест 2</p>
@endsection