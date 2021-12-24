@extends('layouts.layout')

@section('content')
    <div class="products">
        @foreach ($products as $product)
        <div class="product">
            <div>Название: {{$product->name}}</div>
            <div>Описание: {{$product->description}}</div>
            <div>Вес: {{$product->weight}}</div>
            <div>Цена: {{$product->price}}</div>
            <div><img class='product-photo' src="{{'storage/app/public/' . $product->photo}}"></div>
            @auth
                <div>
                    <form method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <button>в корзину</button>
                    </form>
                </div>                
            @endauth
        </div>
    @endforeach
    </div>
@endsection