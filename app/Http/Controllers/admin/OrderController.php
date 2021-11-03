<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends OrderBaseController
{
    
    public function index()
    {
        $orders = Order::all();


        return view('admin.order.index', compact('orders'));
    }

    public function orderConfirm(Request $order)
    {

        $orderId = $order['orderId'];
        $data = ['email' => $order['email'], 'FIO' => $order['FIO']];

        $this->service->update($orderId);

        Mail::to($data['email'])->send(new ConfirmMail($data));

        return redirect()->route('admin.orders.index')->with('success', 'Заказ подтвержден');
    }
}
