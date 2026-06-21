@extends('layouts.admin')

@section('content')

<div class="bg-white rounded shadow p-6">

<h1 class="text-2xl font-bold mb-5">

Detail Transaksi

</h1>

<div class="mb-2">

Invoice :

<b>

{{ $transaction->invoice_number }}

</b>

</div>

<div class="mb-2">

Kasir :

{{ $transaction->user->name }}

</div>

<div class="mb-4">

Cabang :

{{ $transaction->branch->name }}

</div>

<table class="w-full">

<thead>

<tr class="bg-gray-100">

<th class="p-2">Produk</th>

<th>Qty</th>

<th>Harga</th>

<th>Subtotal</th>

</tr>

</thead>

<tbody>

@foreach($transaction->items as $item)

<tr class="border-b">

<td class="p-2">

{{ $item->product->name }}

</td>

<td>

{{ $item->quantity }}

</td>

<td>

Rp {{ number_format($item->price) }}

</td>

<td>

Rp {{ number_format($item->subtotal) }}

</td>

</tr>

@endforeach

</tbody>

</table>

<div class="text-right mt-5 text-xl font-bold">

Total :

Rp {{ number_format($transaction->total_amount) }}

</div>

</div>

@endsection