<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    public function index()
    {
        $movements = StockMovement::with([
            'product',
            'user'
        ])
        ->latest()
        ->get();

        return view(
            'stock-movements.index',
            compact('movements')
        );
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view(
            'stock-movements.create',
            compact('products')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable'
        ]);

        $product = Product::findOrFail(
            $request->product_id
        );

        $product->stock += $request->quantity;

        $product->save();

        StockMovement::create([
            'product_id' => $product->id,
            'user_id' => auth()->id(),
            'type' => 'in',
            'quantity' => $request->quantity,
            'description' => $request->description
        ]);

        return redirect()
            ->route('stock-movements.index')
            ->with(
                'success',
                'Stok berhasil ditambahkan'
            );
    }
}