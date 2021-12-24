<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function mainView(){
        $products = Product::all();
        return view('main.main', compact('products'));
    }

    public function mainPost(Request $request){
        $request->validate([
            'id'=>'required',
        ]); 
        $data=[
            'user_id' => Auth::id(),
            'product_id' => $request->id, 
        ];
        Cart::create($data);
        return redirect()->route('/');
    }

    public function regView(){
        return view('users.reg');
    }

    public function regPost(Request $request){
        $request->validate([
            'login' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',
        ]);
        $request->merge(['password'=>Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('auth');
    }

    public function authView(){
        return view('users.auth');
    }

    public function authPost(Request $request){
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt(['login' => $request->login, 'password' => $request->password])){
            return redirect()->route('/');
        } else {
            return back()->withErrors(['authError'=>'не верный логин или пароль']);
        }
    }

    public function lkView(){
        $orders = Order::where('user_id',Auth::id())->get();
        return view('users.lk', compact('orders'));
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('/');
    }

    public function cartView(){
        $products = Product::all();
        $carts = Cart::where('user_id',Auth::id())->get();
        return view('users.cart', compact('carts','products'));
    }

    public function cartPost(Request $request){
        $request->validate([
            'action' => 'required',
        ]);
        if($request->action == 'delete'){
            $cart_item = Cart::find($request->cart_id);
            $cart_item->delete();
            return redirect()->route('cart');
        }
    }
}
