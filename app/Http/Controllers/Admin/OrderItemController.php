<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function create($orderId)
    {
        return view('orderitems.create', compact('orderId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required',
            'menu_item_id' => 'required',
            'quantity' => 'required',
            'cooking_status' => 'required',
            'special_requests' => 'required',
        ]);

        OrderItem::create($request->all());

        return redirect('/orders')->with('success', 'Order item has been added');
    }

    public function edit($id)
    {
        $orderItem = OrderItem::find($id);
        return view('orderitems.edit', compact('orderItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'order_id' => 'required',
            'menu_item_id' => 'required',
            'quantity' => 'required',
            'cooking_status' => 'required',
            'special_requests' => 'required',
        ]);

        OrderItem::find($id)->update($request->all());

        return redirect()->back()->with('success', 'Order item has been updated');
    }

    public function destroy($id)
    {
        OrderItem::find($id)->delete();

        return redirect()->back()->with('success', 'Order item has been deleted');
    }
}
