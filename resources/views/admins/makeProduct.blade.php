@extends('layouts.layout')

@section('content')
    <div class="big-text">Создание товара</div>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-item">
            @error('name')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Наименование</div>
            <input type="text" name="name">
        </div>
        <div class="form-item">
            @error('description')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Описание</div>
            <textarea name="description"></textarea>
        </div>
        <div class="form-item">
            @error('weight')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Вес</div>
            <input type="text" name="weight">
        </div>
        <div class="form-item">
            @error('price')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Цена</div>
            <input type="text" name="price">
        </div>
        <div class="form-item">
            @error('photo')
                <div class="error">{{$message}}</div>
            @enderror
            <div>Фото</div>
            <input type="file" name="photo">
        </div>
        <div class="form-item">
            <button>Отправить</button>
        </div>
    </form>
@endsection