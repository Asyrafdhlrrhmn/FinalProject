@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded-lg shadow">

    <h2 class="text-xl font-bold mb-4">
        Edit Produk
    </h2>

    <form action="{{ route('products.update', $product) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Produk</label>

            <input
                type="text"
                name="name"
                value="{{ $product->name }}"
                class="w-full border rounded p-2"
                required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>

            <select
                name="category_id"
                class="w-full border rounded p-2">

                @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ $product->category_id == $category->id ? 'selected' : '' }}>

                    {{ $category->name }}

                </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <label>Cabang</label>

            <select
                name="branch_id"
                class="w-full border rounded p-2">

                @foreach($branches as $branch)

                <option
                    value="{{ $branch->id }}"
                    {{ $product->branch_id == $branch->id ? 'selected' : '' }}>

                    {{ $branch->name }}

                </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">
            <label>Harga</label>

            <input
                type="number"
                name="price"
                value="{{ $product->price }}"
                class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label>Stok</label>

            <input
                type="number"
                name="stock"
                value="{{ $product->stock }}"
                class="w-full border rounded p-2">
        </div>

        <button
            class="bg-yellow-500 text-white px-4 py-2 rounded">

            Update

        </button>

    </form>

</div>

@endsection