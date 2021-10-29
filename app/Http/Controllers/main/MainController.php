<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Http\Filters\main\ProductFilter;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{

    public function index(ProductFilter $request)
    {
        $products = Product::filter($request)->where('is_active', true)->get();

        return view("main.index", compact('products'));
    }

}
