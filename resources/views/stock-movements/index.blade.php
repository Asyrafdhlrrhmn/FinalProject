@extends('layouts.admin')

@section('content')

<div class="flex justify-between mb-4">

    <h1 class="text-2xl font-bold">
        Riwayat Stok Masuk
    </h1>

    <a href="{{ route('stock-movements.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded">

        Tambah Stok

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 text-green-700 p-3 rounded mb-3">
    {{ session('success') }}
</div>

@endif

<div class="bg-white shadow rounded">

    <table class="w-full">

        <thead>

                <tr>
                    <th>Produk</th>
                    <th>Jenis</th>
                    <th>Qty</th>
                    <th>User</th>
                    <th>Tanggal</th>
                </tr>

        </thead>

        <tbody>

            @foreach($movements as $movement)

            <tr>

                <td>
                    {{ $movement->product->name }}
                </td>

                <td>

                    @if($movement->type == 'in')

                        <span class="text-green-600 font-semibold">
                            Masuk
                        </span>

                    @else

                        <span class="text-red-600 font-semibold">
                            Keluar
                        </span>

                    @endif

                </td>

                <td>

                    @if($movement->type == 'in')

                        <span class="text-green-600">
                            +{{ $movement->quantity }}
                        </span>

                    @else

                        <span class="text-red-600">
                            -{{ $movement->quantity }}
                        </span>

                    @endif

                </td>

                <td>
                    {{ $movement->user->name }}
                </td>

                <td>
                    {{ $movement->created_at }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection