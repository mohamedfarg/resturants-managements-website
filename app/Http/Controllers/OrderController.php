<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    function create_order()
    {
        // Get cart session
        $cart = session('cart', []);

        // Get the authenticated user
        $user = Auth::user();

        // Create a new order
        $order = new Order();

        // Set the user_id
        $order->user_id = $user->id;

        // Set other attributes
        $order->order_type = 'take away'; // or 'reservasion'
        $order->table_id = null; // Set the table_id to null
        $order->status = 'in process';

        // Save the order to get the ID
        $order->save();

        // Create order items
        foreach ($cart as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id; // Use the obtained order ID
            $orderItem->food_id = $cartItem['food']['id'];
            $orderItem->quantity = $cartItem['quantity'];
            $orderItem->status = 'in process';
            $orderItem->save();
        }

        // Clear the cart session
        session()->flush();

        return response()->json("Order created successfully");
    }

}
