<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('order.index', ['orders' => $orders]);
    }


    /**
     * @param  Order  $order
     * @return Response
     */
    public function edit(Order $order)
    {
        //
    }

}
