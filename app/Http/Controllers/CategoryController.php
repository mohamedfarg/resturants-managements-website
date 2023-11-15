<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
        $category = Category::all();
        return view('categories',
            ['categories'=> $category,]
        );
    }

    function category($id){
        $category = Category::find($id);
        $food = Food::where("category_id",$category->id)->get();
        return view('category-foods',
        [
           'category'=>$category,
           'foods'=>$food,
        ]);
    }
}
