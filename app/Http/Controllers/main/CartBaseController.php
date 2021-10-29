<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Http\Services\main\cart\CartService;
use Illuminate\Http\Request;

class CartBaseController extends Controller
{
    public $service;

    public function __construct(CartService $service)
    {
     
        $this->service = $service;
    }
}
