<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Http\Services\main\order\OrderService;
use Illuminate\Http\Request;

class OrderBaseController extends Controller
{
    public $service;

    public function __construct(OrderService $service)
    {
        
        return $this->service = $service;
    }
}
