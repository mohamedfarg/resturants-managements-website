<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    function index(){
        $carts=session('cart');
        $sum = 0;  // Added a semicolon to terminate the statement
        if($carts){

            foreach($carts as $item) {
                $sum += $item['food']['price'] * $item['quantity'];  // Use '+=' to accumulate the sum
            }

            return view('Cart.cart_summary',[
                'cartData'=>$carts,
                'count'=> count($carts),
                'sum'=> $sum,


                ]

            );
        }else{
            $carts ="" ;
            return view('Cart.cart_summary',[
                'cartData'=>$carts,
                'count'=> 0,
                'sum'=> 0,


                ]

            );



        }

        return response()->json($carts);

    }
    function add($id) {
        $food = Food::find($id);
        if($food){

            // Check if item already exists in session
            $exists = false;
            $cart = session('cart', []);
            foreach ($cart as $cartItem) {
                if ($cartItem['food']->id === $food->id) {
                    $exists = true;
                    break;
                }
            }

            // Add item to session if it doesn't exist
            if (!$exists) {
                $cartItem = [
                    'food' => $food,
                    'quantity' => 1
                ];
                session()->push('cart', $cartItem);
            }
            $value = session()->all();
        }
        else{
            $value = "invalid id";
        }

        // return response()->json($value);
        return redirect()->route('show_cart');

    }

    function edit($id,$qty){

        $food = Food::find($id);
        $cart = session('cart', []);

        if ($cart && $food) {
            foreach ($cart as &$item) {
                if ($item['food']['id'] == $food->id) {
                    $item['quantity'] = (int)$qty;
                }
            }

            // Save the updated cart back to the session
            session(['cart' => $cart]);

            return response()->json('Cart updated successfully');
        }

        return response()->json('Cart update failed');
    }


    function remove($id)
    {
        $cart = session('cart', []);


        if ($cart) {
            // Use array_filter to remove the item with the specified ID
            $cart = array_filter($cart, function ($item) use ($id) {
                return $item['food']['id'] != $id;
            });

            // Save the updated cart back to the session
            session(['cart' => $cart]);

            return response()->json('Item removed from cart successfully');
        }

        return response()->json('remove faild');
    }



    function destroy(){
        Session::flush();


        return response()->json('cart deleted sucesfully');
    }
}
