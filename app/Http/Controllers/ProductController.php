<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Branch;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(
            'branch',
            'category'
        )->latest()->paginate(10);

        return view(
            'products.index',
            compact('products')
        );
    }

    public function create()
    {
        $branches = Branch::all();
        $categories = Category::all();

        return view(
            'products.create',
            compact(
                'branches',
                'categories'
            )
        );
    }

    public function store(Request $request)
    {
        Product::create($request->all());

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Produk berhasil ditambahkan'
            );
    }

    public function edit(Product $product)
    {
        $branches = Branch::all();
        $categories = Category::all();

        return view(
            'products.edit',
            compact(
                'product',
                'branches',
                'categories'
            )
        );
    }

    public function update(
        Request $request,
        Product $product
    )
    {
        $product->update(
            $request->all()
        );

        return redirect()
            ->route('products.index')
            ->with(
                'success',
                'Produk berhasil diupdate'
            );
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()
            ->with(
                'success',
                'Produk berhasil dihapus'
            );
    }
}