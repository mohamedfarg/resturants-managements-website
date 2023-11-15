<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('Admin\Category.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming you want to store images
        ]);

        // Handle image upload if an image is provided
        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('category_images', 'public');
        }

        // Create a new category
        $category = new Category;
            $category->name = $request->input('name');
            $category->img = $imgPath;
            $category->save();


        return redirect()->route('home')->with('success', 'Category created successfully.');
    }

    // Display the specified resource.
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Show the form for editing the specified resource.
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Category $category)
    {
        // Validation rules for updating
        $request->validate([
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming you want to store images
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('img')) {
            // Delete the old image if it exists
            if ($category->img) {
                Storage::disk('public')->delete($category->img);
            }
            $imgPath = $request->file('img')->store('category_images', 'public');
            $category->img = $imgPath;
        }

        // Update category details
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Category $category)
    {
        // Delete the category's image if it exists
        if ($category->img) {
            Storage::disk('public')->delete($category->img);
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
