<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
    $query = Product::query();

    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $products = $query->get();
    return view('products.index', compact('products'));
    }

    public function filter(Request $request)
    {
    $query = Product::query();

    if ($request->has('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->has('category') && $request->category != '') {
        $query->where('category', $request->category);
    }

    $products = $query->get();
    return view('products.index', compact('products'));
    }
}