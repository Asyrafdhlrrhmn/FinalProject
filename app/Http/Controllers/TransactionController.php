<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StockMovement;

class TransactionController extends Controller
{
    /**
     * Menampilkan daftar transaksi
     */
    public function index()
    {
        $transactions = Sale::with(['user', 'branch'])
            ->latest()
            ->paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Menampilkan form tambah transaksi
     */
    public function create()
    {
        $products = Product::all();

        return view('transactions.create', compact('products'));
    }

    /**
     * Menyimpan transaksi baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($request) {

            $sale = Sale::create([
                'branch_id' => auth()->user()->branch_id,
                'user_id' => auth()->id(),
                'invoice_number' => 'INV-' . date('YmdHis'),
                'total_amount' => 0,
                'transaction_date' => now(),
            ]);

            $grandTotal = 0;

            foreach ($request->items as $item) {

                $product = Product::findOrFail(
                    $item['product_id']
                );

                $subtotal =
                    $product->price *
                    $item['quantity'];

                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                    'subtotal' => $subtotal,
                ]);

                // Kurangi stok produk
                $product->decrement(
                    'stock',
                    $item['quantity']
                );

                // Simpan histori stok keluar
                StockMovement::create([
                    'product_id' => $product->id,
                    'user_id' => auth()->id(),
                    'type' => 'out',
                    'quantity' => $item['quantity'],
                    'description' =>
                        'Penjualan ' .
                        $sale->invoice_number,
                ]);

                $grandTotal += $subtotal;
            }

            $sale->update([
                'total_amount' => $grandTotal,
            ]);
        });

        return redirect()
            ->route('transactions.index')
            ->with(
                'success',
                'Transaksi berhasil disimpan.'
            );
    }

    /**
     * Detail transaksi
     */
    public function show(Sale $transaction)
    {
        $transaction->load([
            'items.product',
            'user',
            'branch'
        ]);

        return view('transactions.show', compact('transaction'));
    }

    /**
     * Form edit transaksi
     */
    public function edit(Sale $transaction)
    {
        $products = Product::all();

        return view('transactions.edit', compact('transaction', 'products'));
    }

    /**
     * Update transaksi
     */
    public function update(Request $request, Sale $transaction)
    {
        return redirect()
            ->route('transactions.index')
            ->with('info', 'Fitur update transaksi belum diimplementasikan.');
    }

    /**
     * Hapus transaksi
     */
    public function destroy(Sale $transaction)
    {
        $transaction->delete();

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}