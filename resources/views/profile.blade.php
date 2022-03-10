@extends('layouts.main')

@section('title')
    @parent Профиль
@endsection
@section('menu')
    @include ('menu')
@endsection

@section('title_page')
    Карточка профиля {{ $user->name }}
@endsection

@section('content')
    <form method="POST" action="{{ route('updateProfile') }}">
        @csrf
    
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>
    
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" autocomplete="name" autofocus>
    
                @if ($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->get('name') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
    
            <div class="col-md-6">
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" autocomplete="email">
    
                @if ($errors->has('email'))
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->get('email') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>
    
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
    
                @if ($errors->has('password'))
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->get('password') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    
        <div class="form-group row">
            <label for="new_password" class="col-md-4 col-form-label text-md-right">Новый пароль</label>
    
            <div class="col-md-6">

                <input id="new_password" type="password" class="form-control" value="{{ old('new_password') }}" name="new_password" autocomplete="new-password">
                @if ($errors->has('new_password'))
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->get('new_password') as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                   Изменить профиль
                </button>
            </div>
        </div>
    </form>
@endsection