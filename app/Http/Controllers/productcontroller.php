<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productController extends Controller
{
   
    public function index()
    {
        $products = product::all();
        return view('products.index', compact('products'));
    }

    
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        product::create($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'product created successfully');
    }

    public function edit($id)
    {
        $product = product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $product = product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')
                         ->with('success', 'product updated successfully');
    }

    public function destroy($id)
    {
        $product = product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'product deleted successfully');
    }
}
