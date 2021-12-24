@extends('layouts.layout')

@section('content')
    <div class="big-text">Регистрация</div>
    <form method="POST">
        @csrf
        <div class="form-item">
            @error('login')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Логин</div>
            <input type="text" name="login">
        </div>
        <div class="form-item">
            @error('name')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Имя</div>
            <input type="text" name="name">
        </div>
        <div class="form-item">
            @error('email')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Email</div>
            <input type="email" name="email">
        </div>
        <div class="form-item">
            @error('password')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Пароль</div>
            <input type="password" name="password">
        </div>
        <div class="form-item">
            <div>Повторите пароль</div>
            <input type="password" name="password_confirmation">
        </div>
        <div class="form-item">
            <button>Отправить</button>
        </div>
    </form>
@endsection