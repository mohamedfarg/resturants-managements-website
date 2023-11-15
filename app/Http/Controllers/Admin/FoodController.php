<?php

namespace App\Http\Controllers\admin;

use App\Models\Food;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{

    public function index()
    {
        $foods = Food::all();
        return view('admin/Food.all_food', compact('foods'));
    }

    public function create()
    {
        return view('admin\Food.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'ingredients' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('food_images', 'public');
        } else {
            $imgPath = null;
        }

        $food = new Food;
        $food->menues_id=1;
        $food->category_id=1;
        $food->name = $request->input('name');
        $food->description = $request->input('description');
        $food->price = $request->input('price');
        $food->ingredients = $request->input('ingredients');
        $food->img = $imgPath;
        $food->save();

        return redirect()->route('home')->with('success', 'Food item created successfully');
    }

    public function show($id)
    {
        $food = Food::find($id);
        return view('foods.show', compact('food'));
    }

    public function edit($id)
    {
        $food = Food::find($id);
        return view('admin/Food.edit', compact('food'));
    }

    public function update(Request $request, $id)
    {
        $food = Food::find($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'ingredients' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('img')) {
            // Delete the old image if it exists
            if ($food->img) {
                Storage::disk('public')->delete($food->img);
            }

            // Store the new image
            $imgPath = $request->file('img')->store('food_images', 'public');
            $food->img = $imgPath;
        }

        $food->name = $request->input('name');
        $food->description = $request->input('description');
        $food->price = $request->input('price');
        $food->ingredients = $request->input('ingredients');
        $food->save();

        return redirect()->route('foods.index')->with('success', 'Food item updated successfully');
    }

    public function destroy($id)
    {
        $food = Food::find($id);
        if ($food) {
            if ($food->img) {
                Storage::disk('public')->delete($food->img);
            }
            $food->delete();
            return redirect()->route('foods.index')->with('success', 'Food item deleted successfully');
        }
        return redirect()->route('foods.index')->with('error', 'Food item not found');
    }
}
