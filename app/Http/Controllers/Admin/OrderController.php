<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin/order.all_orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        return view('orders.show', compact('order'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_id' => 'required',
            'customer_id' => 'required',
            'total_amount' => 'required',
            'order_date' => 'required',
            'order_time' => 'required',
            'order_status' => 'required',
        ]);

        Order::create($request->all());

        return redirect('/orders')->with('success', 'Order has been added');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'table_id' => 'required',
            'customer_id' => 'required',
            'total_amount' => 'required',
            'order_date' => 'required',
            'order_time' => 'required',
            'order_status' => 'required',
        ]);

        Order::find($id)->update($request->all());

        return redirect('/orders')->with('success', 'Order has been updated');
    }

    public function destroy($id)
    {
        Order::find($id)->delete();

        return redirect('/orders')->with('success', 'Order has been deleted');
    }
}
