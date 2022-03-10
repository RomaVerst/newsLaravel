@extends('layouts.main')
@section('title')
    @parent Добавление новости
@endsection
@section('menu')
    @include ('admin.menu')
@endsection

@section('title_page')
    Добавление новости
@endsection

@section('content')
        <form enctype="multipart/form-data" method="POST" action="@if($news->id){{ route('admin.update', $news) }}@else{{ route('admin.create') }}@endif">
            @csrf

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">Заголовок новости</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') ?? $news->title ?? '' }}" required autofocus>
                    @if($errors->has('title'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('title') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="form-group row">
                <label for="category_id" class="col-md-4 col-form-label text-md-right">Категория новости</label>
                <div class="col-md-6">
                    <select id="category_id" class="form-control" name="category_id">
                       
                        @forelse ($categories as $item)
                            <option @if (($news->category_id == $item->id) || old('category_id') == $item->id) selected @endif value="{{ $item->id }}">{{ $item->title }}</option>
                        @empty
                            <option selected value="0">Нет категорий</option>
                        @endforelse
                    </select>
                    @if($errors->has('category_id'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('category_id') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="text" class="col-md-4 col-form-label text-md-right">Текст новости</label>

                <div class="col-md-6">
                    <textarea name="text" class="form-control" id="text" cols="30" rows="10">{{ old('text') ?? $news->text }}</textarea>
                    @if($errors->has('text'))
                    <div class="alert alert-danger" role="alert">
                        @foreach($errors->get('text') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-12 text-md-center">
                <input type="file" name="image">
                @if($errors->has('image'))
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->get('image') as $error)
                        {{ $error }}
                    @endforeach
                </div>
                @endif
            </div>
            <div class="form-group row">
                <label for="isprivate" class="col-md-4 col-form-label text-md-right">Приватная</label>
                <div class="col-md-6">
                    <input id="isprivate" @if(old('isprivate')==1 || $news->isprivate==1) checked @endif type="checkbox" class="form-check-input" name="isprivate" value="1">
                </div>   
            </div>
            <div class="form-group row justify-content-end">
                <div class="col-md-4">
                    <input type="submit" class="btn btn-primary" value="@if($news->id) Изменить @else Добавить @endif новость">
                </div>
            </div>
        </form>
@endsection