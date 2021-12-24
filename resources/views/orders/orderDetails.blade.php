@extends('layouts.layout')

@section('content')
    <span class="big-text">Информация о заказе @if ($order->status_id == 6)
        <br>(ЗАКАЗ ОТМЕНЁН)
    @endif</span>
    <div class="cart">
        <div>Товары: </div>
        @foreach ($carts as $cart)
            <div class="cart-item">
                    @foreach ($products as $product)
                        @if ($cart->product_id == $product->id)
                            <a class="product-link" href="">
                                <div class="link-item">
                                    <div>Наименование: {{$product->name}}</div>
                                    <div>Цена: {{$product->price}}</div>
                                </div>
                                <div><img class='product-photo' src="{{'/storage/app/public/' . $product->photo}}"></div>
                            </a>
                        @endif
                    @endforeach
            </div>
        @endforeach
        <div class="">
            <div class="">Информация о доставке: </div>
            <div class="">Статус заказа: {{$order_status->name}}</div>
            <div class="">Пункт выдачи: {{$address->address}}</div>
            <div class="">Заказ сделан: {{$date}}</div>
            <div class="">Время доставки: {{$address->time}}</div>
        </div>
        

    </div>
    <div>
        @if ($order->status_id != 6)
        <form method="POST">
            @csrf
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="order_id" value="{{$delivery->order_id}}">
            <button>Отменить заказ</button>
        </form>
        @endif
    </div>
@endsection