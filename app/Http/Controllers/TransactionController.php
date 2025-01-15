<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $total_price = $product->price * $request->quantity;

        // Kurangi stok produk
        $product->stock -= $request->quantity;
        $product->save();

        Transaction::create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total_price' => $total_price,
        ]);

        return redirect()->route('transactions.index');
    }
}