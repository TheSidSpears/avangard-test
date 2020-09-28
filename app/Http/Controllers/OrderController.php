<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('products')->paginate(20);
        return view('order.index', ['orders' => $orders]);
    }


    /**
     * @param  Order  $order
     * @return Response
     */
    public function edit(Order $order)
    {
        return view('order.edit', ['order' => $order]);
    }

    /**
     * @param  Order  $order
     * @return Response
     */
    public function update(Order $order)
    {
        return 'uppdate';
    }
}
