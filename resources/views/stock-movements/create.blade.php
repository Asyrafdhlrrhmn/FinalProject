@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded shadow max-w-xl">

    <h1 class="text-2xl font-bold mb-4">
        Tambah Stok
    </h1>

    <form
        action="{{ route('stock-movements.store') }}"
        method="POST">

        @csrf

        <div class="mb-4">

            <label>Produk</label>

            <select
                name="product_id"
                class="w-full border rounded p-2">

                @foreach($products as $product)

                    <option
                        value="{{ $product->id }}">

                        {{ $product->name }}
                        (stok : {{ $product->stock }})

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-4">

            <label>Jumlah</label>

            <input
                type="number"
                name="quantity"
                min="1"
                class="w-full border rounded p-2">

        </div>

        <div class="mb-4">

            <label>Keterangan</label>

            <textarea
                name="description"
                class="w-full border rounded p-2"></textarea>

        </div>

        <button
            class="bg-blue-600 text-white px-4 py-2 rounded">

            Simpan

        </button>

    </form>

</div>

@endsection