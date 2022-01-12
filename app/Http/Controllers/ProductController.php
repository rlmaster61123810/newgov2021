<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //index
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }
    // create
    public function create()
    {
        return view('products.create');
    }
    // store
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->save();
        return redirect('/products');
    }
    // show
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', ['product' => $product]);
    }
    // edit
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', ['product' => $product]);
    }
    // update
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->save();
        return redirect('/products');
    }
    // destroy
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/products');
    }


}
