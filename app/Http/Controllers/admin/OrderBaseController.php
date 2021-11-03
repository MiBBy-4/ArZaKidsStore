<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Services\admin\OrderService;
use Illuminate\Http\Request;

class OrderBaseController extends Controller
{
    public $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }
}
