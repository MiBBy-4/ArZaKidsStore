<?php

namespace App\Http\Services\admin;

use App\Models\Order;
use App\Models\Product;

class OrderService
{
    public function update($orderId)
    {
        $order = Order::where("id", $orderId)->get()->first();

        $order->is_checked = 1;

        $order->save();

    }
}