<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Menue;
use App\Models\Module;
use App\Models\Resturant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResturantController extends Controller
{
    function resturant_details($id) {
        $restaurant = Resturant::findOrFail($id);
        try {

            $menu = Menue::where('resturant_id', $id)->firstOrFail();

            $foods = Food::where('menues_id', $menu->id)->get();

            return view('foods', [
                'restaurant' => $restaurant,
                'foods' => $foods,
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // abort(404); // Or handle the case where the model is not found
            return view('foods', ['resturant' => $restaurant,'foods'=>'']);
        }

    }

}
