<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //

    public function all()
    {
        $orders = Order::paginate(10);
        return view('admin.orders.all', compact('orders'));
    }

    public function create()
    {
        return view('admin.orders.create');
    }

    public function store(Request $request)
    {
        return view('admin.orders.store');
    }

    public function delete($order_id)
    {
        $order = Order::find($order_id);
        $order->delete();
        return back()->with('success', 'سفارش حذف شد');
    }

    public function edit($order_id)
    {
        $order = Order::find($order_id);
        return view('admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $order_id)
    {
        $order = Order::find($order_id);
        $order->update($request->all());
        return back()->with('success', 'سفارش آپدیت شد');
    }





}
