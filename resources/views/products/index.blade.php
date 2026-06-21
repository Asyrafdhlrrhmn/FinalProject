@extends('layouts.admin')

@section('content')

<div class="flex justify-between mb-4">

    <h2 class="text-2xl font-bold">
        Data Produk
    </h2>

    <a href="{{ route('products.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">

        Tambah Produk

    </a>

</div>

<div class="bg-white rounded-lg shadow">

<table class="w-full">

    <thead class="bg-gray-100">

        <tr>
            <th class="p-3">Nama</th>
            <th class="p-3">Kategori</th>
            <th class="p-3">Cabang</th>
            <th class="p-3">Harga</th>
            <th class="p-3">Stok</th>
            <th class="p-3">Aksi</th>
        </tr>

    </thead>

    <tbody>

        @forelse($products as $product)

        <tr class="border-b">

            <td class="p-3">
                {{ $product->name }}
            </td>

            <td class="p-3">
                {{ $product->category->name ?? '-' }}
            </td>

            <td class="p-3">
                {{ $product->branch->name ?? '-' }}
            </td>

            <td class="p-3">
                Rp {{ number_format($product->price) }}
            </td>

            <td class="p-3">
                {{ $product->stock }}
            </td>

            <td class="p-3">

                <a href="{{ route('products.edit',$product) }}"
                   class="bg-yellow-500 text-white px-3 py-1 rounded">

                    Edit

                </a>

                <form
                    action="{{ route('products.destroy',$product) }}"
                    method="POST"
                    class="inline">

                    @csrf
                    @method('DELETE')

                    <button
                        class="bg-red-600 text-white px-3 py-1 rounded">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="6" class="p-4 text-center">
                Belum ada produk
            </td>
        </tr>

        @endforelse

    </tbody>

</table>

</div>

@endsection