<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{category, Resturant};
class HomeController extends Controller
{
    function index(){
        $resturant = Resturant::all();

        $resturants = $resturant->take(6);
        $categories = Category::all();
        $resturants = $resturant->take(3);
        return view('index',[
            'resturants' => $resturants,
            'categories' => $categories,
        ]);
    }
    function category(){
        return view('category-foods');
    }

}
