<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\DeliveryStatus;
use App\Models\Order;
use App\Models\OrderCart;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class OrderController extends Controller
{
    public function confirmationView()
    {
        $addresses = Address::all();
        $products = Product::all();
        $carts = Cart::where('user_id',Auth::id())->get();
        $price = 0;
        foreach($carts as $cart)
        {
            foreach($products as $product)
            {
                if ($product->id == $cart->product_id){
                    $price += $product->price;
                }
            }
        }
        if(sizeof($carts)>0){
            return view('orders.orderConfirmation', 
            compact('addresses','products','carts','price'));
        } else {
            return redirect()->route('/');
        }
        
    }

    public function confirmationPost(Request $request){
        $request->validate([
            'action'=>'required',
            'card-number'=>'required',
            'card-cvv'=>'required',
            'card-name'=>'required',
        ]);
        $carts = Cart::where('user_id', Auth::id())->get();
        $orderData=[
            'user_id' => Auth::id(),
            'status_id' => 1,
        ];
        $order = Order::create($orderData);
        foreach($carts as $cart){
            $orderCartData=[
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
            ];
            OrderCart::create($orderCartData);
        } 
        $deliveryData=[
            'order_id' => $order->id,
            'address_id' => $request->address_id,
        ];
        Delivery::create($deliveryData);
        $cartsdel = Cart::where('user_id', Auth::id());
        $cartsdel->delete();
        return redirect()->route('lk');
    }

    public function orderDetailsView(Order $order){
        if($order){
            if($order->user_id == Auth::id()){
                $carts = OrderCart::where('order_id', $order->id)->get();
                $products = Product::all();
                $delivery = Delivery::where('order_id', $order->id)->first();
                $address = Address::find($delivery->address_id)->first();
                $date = $order->created_at;
                $delivery_statuses = DeliveryStatus::all();
                $order_status = Status::where('id',$order->status_id)->first();
                return view('orders.orderDetails', 
                compact('order','products','delivery','carts','address',
                'date','delivery_statuses','order_status'));
            } else{
                return redirect()->route('/');
            }
        } else{
            return redirect()->route('/');
        } 
    }

    public function orderDetailsPost(Order $order, Request $request){
        if($request->action == 'delete'){
            $delivery = Delivery::where('order_id',$order->id);
            $order->update(['status_id'=>6]);
            $delivery->update(['status_id'=>2]);
            return back();
        }
    }
}
