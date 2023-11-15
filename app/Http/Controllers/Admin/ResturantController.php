<?php

namespace App\Http\Controllers\Admin;

use App\Models\Resturant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ResturantController extends Controller
{
     // Display a listing of the resource.
     public function index()
     {
        $resturants = Resturant::all();
         return view('admin/Resturant.all_resturant', compact('resturants'));
     }

     // Show the form for creating a new resource.
     public function create()
     {
         return view('admin\Resturant.create');
     }

     // Store a newly created resource in storage.
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|max:255',
             'address' => 'required|max:255',
             'phone_number' => 'required',
             'website' => 'required',
             'description'=>'required',
             'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming you want to store images
            ]);

            // Handle image upload if an image is provided

            if ($request->hasFile('img')) {
                $imgPath = $request->file('img')->store('resturant_images', 'public');
            } else {

                $imgPath = null;
            }


            $resturant = new Resturant;
                $resturant->name = $request->input('name');
                $resturant->address = $request->input('address');
                $resturant->phone_number = $request->input('phone_number');
                $resturant->description = $request->input('description');
                $resturant->website = $request->input('website');
                $resturant->img = $imgPath;
                $resturant->save();

             return redirect()->route('home')->with('success', 'Resturant created successfully.');
        }

     // Display the specified resource.
     public function show(Resturant $resturant)
     {
         return view('resturants.show', compact('resturant'));
     }

     // Show the form for editing the specified resource.
     public function edit($id)
     {
        $resturant = Resturant::findOrFail($id);

         return view('admin/Resturant.edit', compact('resturant'));
     }

     // Update the specified resource in storage.

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'website' => 'nullable',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the restaurant by ID
        $restaurant = Resturant::findOrFail($id);

        // Update the restaurant attributes
        $restaurant->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'website' => $request->input('website'),

        ]);

        // Handle image upload if provided
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('restaurant_images', 'public');
            $restaurant->img = $imgPath;
            $restaurant->save();
        }

        // Redirect back or to a different page
        return redirect()->route('restaurants.index')->with('success', 'Restaurant updated successfully');
    }



     // Remove the specified resource from storage.
     public function destroy( $id)
     {
        $returnat = Resturant::find($id);
        if ($returnat) {
            if ($returnat->img) {
                Storage::disk('public')->delete($returnat->img);
            }
            $returnat->delete();
            return redirect()->route('returnats.index')->with('success', 'returnat item deleted successfully');
        }
        return redirect()->route('returnats.index')->with('error', 'returnat item not found');
     }
}
