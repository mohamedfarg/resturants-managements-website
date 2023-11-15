<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('tables.index', compact('tables'));
    }

    public function show($id)
    {
        $table = Table::find($id);
        return view('tables.show', compact('table'));
    }

    public function create()
    {
        return view('tables.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required',
            'number' => 'required',
            'seating_capacity' => 'required',
            'status' => 'required',
        ]);

        Table::create($request->all());

        return redirect('/tables')->with('success', 'Table has been added');
    }

    public function edit($id)
    {
        $table = Table::find($id);
        return view('tables.edit', compact('table'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'restaurant_id' => 'required',
            'number' => 'required',
            'seating_capacity' => 'required',
            'status' => 'required',
        ]);

        Table::find($id)->update($request->all());

        return redirect('/tables')->with('success', 'Table has been updated');
    }

    public function destroy($id)
    {
        Table::find($id)->delete();

        return redirect('/tables')->with('success', 'Table has been deleted');
    }
}
