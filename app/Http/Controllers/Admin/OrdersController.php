<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
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

    }

    public function store(Request $request)
    {

    }

    public function delete($order_id)
    {

    }

    public function edit($order_id)
    {

    }

    public function update(Request $request, $order_id)
    {

    }

}
