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
   
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);
        
        Mail::to($data['email'])->send(new OrderMail($data));

        return redirect()->route('main.index');
    }
}
