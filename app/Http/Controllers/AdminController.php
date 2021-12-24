<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function adminLkView(){
        return view('admins.adminLk');
    }

    public function makeProductView(){
        return view('admins.makeProduct');
    }

    public function makeProductPost(Request $request){
        $request->validate([
            // 'name'=>'required',
            // 'description'=>'required',
            // 'weight'=>'required',
            // 'price'=>'required',
            'photo'=>'required|file|mimes:png,jpg,gif,bmp|max:10240',
        ]);
        $name_photo = explode("/", $request->file('photo')->store('public'))[1];
        $data = ['photo' => $name_photo];
        $data += $request->only('name','description','weight','price');
        Product::create($data);
        return redirect()->route('/');

    }
}
