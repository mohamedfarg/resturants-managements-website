<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Menue;
use App\Models\Module;
use App\Models\Resturant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FoodController extends Controller
{

    function index(){
        $foods = Food::paginate(1);
        return view("all-food",['foods' => $foods]);
    }
    function search(Request $request){
        $key=$request->input('key');
        $food = Food::where('name','LIKE',"%$key%")->get();


        return view('food-search',['foods' => $food,]);
    }


}
