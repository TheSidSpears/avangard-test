<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrder;
use App\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $orders = Order::with('products')->paginate(20);
        return view('order.index', ['orders' => $orders]);
    }


    /**
     * @param  Order  $order
     * @return View
     */
    public function edit(Order $order): View
    {
        return view('order.edit', ['order' => $order]);
    }

    /**
     * @param  UpdateOrder  $request
     * @param  Order  $order
     * @return RedirectResponse
     */
    public function update(UpdateOrder $request, Order $order): RedirectResponse
    {
        $order->update($request->all());
        $order->partner()->update($request->partner);

        return redirect()->back();
    }
}
