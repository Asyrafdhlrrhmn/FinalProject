@extends('layouts.admin')

@section('content')

<div class="max-w-xl mx-auto bg-white rounded shadow p-6">

<h1 class="text-xl font-bold mb-6">

Tambah Transaksi

</h1>

<form action="{{ route('transactions.store') }}" method="POST">

@csrf

<div class="mb-4">

<label>Produk</label>

<select
name="items[0][product_id]"
class="w-full border rounded p-2">

@foreach($products as $product)

<option value="{{ $product->id }}">

{{ $product->name }}

(Rp {{ number_format($product->price) }})

</option>

@endforeach

</select>

</div>

<div class="mb-4">

<label>Jumlah</label>

<input
type="number"
name="items[0][quantity]"
value="1"
min="1"
class="w-full border rounded p-2">

</div>

<button
class="bg-blue-600 text-white px-5 py-2 rounded">

Simpan

</button>

</form>

</div>

@endsection