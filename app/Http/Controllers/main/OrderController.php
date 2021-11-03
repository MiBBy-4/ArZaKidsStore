<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UpdateRequest;
use App\Http\Requests\main\order\StoreRequest;
use App\Mail\OrderMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends OrderBaseController
{
    public function index()
    {
        $userOrders = Order::where("user_id", Auth::id())->get();
        
        $ordersProductsCount = 0;

        foreach($userOrders as $order){
            foreach($order->products as $product){
                $ordersProductsCount++;
            }
        }

        return view('main.order.index', compact('userOrders', 'ordersProductsCount'));
    }


    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        Mail::to($data['email'])->send(new OrderMail($data));

        return redirect()->route('main.index')->with('orderSuccess', 'покупка совершена успешно');
    }
}
