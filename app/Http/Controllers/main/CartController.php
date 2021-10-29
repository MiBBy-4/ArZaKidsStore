<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartController extends CartBaseController
{
    public function index()
    {
        $userId = Auth::id();
        $products = null;
        $sum = null;
        if(Cart::where("user_id", $userId)->first()){
            $products = Cart::where("user_id", $userId)->first()->products;
            $sum = Cart::where("user_id", $userId)->first()->products->sum('price');
        }
       
        return view('main.cart.index', compact('products', 'sum'));
        
    }


    public function store(Request $request)
    {
        $id = $request['product_id'];
        
        $this->service->store($id);

        return back();
    }

    public function destroy(Request $request)
    {
        $productId = $request['product_id'];
        
        $this->service->destroy($productId);
        
        return back();
    }
}
