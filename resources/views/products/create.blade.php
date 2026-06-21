@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded-lg shadow">

    <h2 class="text-xl font-bold mb-4">
        Tambah Produk
    </h2>

    <form action="{{ route('products.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label>Nama Produk</label>

            <input
                type="text"
                name="name"
                class="w-full border rounded p-2"
                required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>

            <select
                name="category_id"
                class="w-full border rounded p-2">

                @foreach($categories as $category)

                <option value="{{ $category->id }}">
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

                <option value="{{ $branch->id }}">
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
                class="w-full border rounded p-2">
        </div>

        <div class="mb-3">
            <label>Stok</label>

            <input
                type="number"
                name="stock"
                class="w-full border rounded p-2">
        </div>

        <button
            class="bg-blue-600 text-white px-4 py-2 rounded">

            Simpan

        </button>

    </form>

</div>

@endsection