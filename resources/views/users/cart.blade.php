@extends('layouts.layout')

@section('content')
    <div class="big-text">Ваша корзина</div>
    <div class="cart">
        @foreach ($carts as $cart)
            <div class="cart-item">
                <div>
                    @foreach ($products as $product)
                        @if ($cart->product_id == $product->id)
                            <a href=""><span>Наименование: {{$product->name}} |</span>
                                <span>Цена: {{$product->price}}</span></a>
                            <span><form method="POST">
                                @csrf
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="cart_id" value="{{$cart->id}}">
                                <button>Удалить</button>
                            </form></span>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
        <div>
            @if(sizeof($carts)>0)
            <a href="{{route('confirmation')}}">Оформить заказ</a>
            @endif
        </div>
    </div>
@endsection