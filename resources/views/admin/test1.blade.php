@extends('layouts.main')
@section('title')
    @parent Test1
@endsection
@section('menu')
    @include ('admin.menu')
@endsection

@section('title_page')
    Test1
@endsection

@section('content')
   <p>некий тест 1</p>
@endsection