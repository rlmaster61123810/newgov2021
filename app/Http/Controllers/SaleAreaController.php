<?php

namespace App\Http\Controllers;

use App\Models\SaleArea;
use Illuminate\Http\Request;

class SaleAreaController extends Controller
{

    public function index()
    {
        $sale_areas = SaleArea::all();
        return view('sale_areas.index', ['sale_areas' => $sale_areas]);
    }


    public function create()
    {
        return view('sale_areas.create');
    }


    public function store(Request $request)
    {
        // validate
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'size' => 'required',
            'price' => 'required',
        ]);

        // store
        $sale_area = new SaleArea();
        $sale_area->name = $request->name;
        $sale_area->location = $request->location;
        $sale_area->size = $request->size;
        $sale_area->price = $request->price;
        $sale_area->save();

        // redirect
        return redirect('/sale_areas')->with('success', 'Sale Area created successfully');
    }


    public function show($id)
    {
        $sale_area = SaleArea::find($id);
        return view('sale_areas.show', ['sale_area' => $sale_area]);
    }


    public function edit($id)
    {
        $sale_area = SaleArea::find($id);
        return view('sale_areas.edit', ['sale_area' => $sale_area]);
    }


    public function update(Request $request, $id)
    {
        // validate
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'size' => 'required',
            'price' => 'required',
        ]);

        // update
        $sale_area = SaleArea::find($id);
        $sale_area->name = $request->name;
        $sale_area->location = $request->location;
        $sale_area->size = $request->size;
        $sale_area->price = $request->price;
        $sale_area->save();

        // redirect
        return redirect('/sale_areas')->with('success', 'Sale Area updated successfully');
    }

    public function destroy($id)
    {
        $sale_area = SaleArea::find($id);
        $sale_area->delete();
        return redirect('/sale_areas');
    }
}
