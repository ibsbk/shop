@extends('layouts.layout')

@section('content')
    <div class=""><span class="big-text">Личный кабинет</span><span class=""><a href="{{route('logout')}}">выйти</a></span></div>
    <div class="orders">
        @foreach ($orders as $order)
        <div class="order">
            <a href="{{'/orderDetails/'.$order->id}}">Заказ номер: {{$order->id}} 
            @if ($order->status_id == 6)
                <span>(отменён)</span>
            @endif
            </a>
        </div>
        @endforeach
    </div>
@endsection