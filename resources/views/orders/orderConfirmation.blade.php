@extends('layouts.layout')

@section('content')
    <div class="big-text">Оформление заказа</div>
    <div class="cart">
        <div class="confirm">
            <div>Цена: {{$price}}</div>
            <form method="POST" class="form">
                @csrf
                <div class="">
                    <input type="hidden" name="action" value="add">
                    <button class="button-confirm">Оформить заказ</button>
                </div>
            <div class="card">
                <div class="card-number">
                    <input type="text" name="card-number" placeholder="номер карты">
                </div>
                <div class="second-line">
                    <span class="card-name">
                        <input type="text" name="card-name" placeholder="имя держателя">
                    </span>
                    <span class="card-cvv">
                        <input type="text" name="card-cvv" placeholder="cvv">
                    </span>
                </div>
            </div>
        </div>
        <div class="address">
            <div class="">Выберите адрес доставки</div>
            <select name="address_id">
                @foreach ($addresses as $address)
                    <option value="{{$address->id}}">{{$address->address}}</option>
                @endforeach
            </select>
        </form>
        </div>
        @foreach ($carts as $cart)
            <div class="cart-item">
                    @foreach ($products as $product)
                        @if ($cart->product_id == $product->id)
                            <a class="product-link" href="">
                                <div class="link-item">
                                    <div>Наименование: {{$product->name}}</div>
                                    <div>Цена: {{$product->price}}</div>
                                </div>
                                <div><img class='product-photo' src="{{'storage/app/public/' . $product->photo}}"></div>
                            </a>
                        @endif
                    @endforeach
            </div>
        @endforeach
    
    </div>
@endsection