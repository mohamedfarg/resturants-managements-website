<?php

namespace App\Http\Controllers;

use App\Models\Menue;
use Illuminate\Http\Request;

class MenueController extends Controller
{
    public function index()
    {
        $menues = Menue::all();
        return view('menu_items.index', compact('Menues'));
    }

    public function show($id)
    {
        $menue = Menue::find($id);
        return view('menu_items.show', compact('Menue'));
    }

    public function create()
    {
        return view('menu_items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'ingredients' => 'required',
        ]);

        Menue::create($request->all());

        return redirect('/menu_items')->with('success', 'Menu item has been added');
    }

    public function edit($id)
    {
        $menue = Menue::find($id);
        return view('menu_items.edit', compact('Menue'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'restaurant_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'ingredients' => 'required',
        ]);

        Menue::find($id)->update($request->all());

        return redirect('/menu_items')->with('success', 'Menu item has been updated');
    }

    public function destroy($id)
    {
        Menue::find($id)->delete();

        return redirect('/menu_items')->with('success', 'Menu item has been deleted');
    }
}
