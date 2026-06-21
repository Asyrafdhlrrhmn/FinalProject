@extends('layouts.admin')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <x-admin.stat-card
        title="Transaksi Hari Ini"
        :value="$todaySales"
    />

</div>

<div class="bg-white mt-5 rounded-lg shadow p-5">

    <h2 class="font-bold mb-4">
        Riwayat Transaksi
    </h2>

    <table class="w-full">

        <thead>
            <tr>
                <th>Invoice</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>

        <tbody>

            @foreach($transactions as $trx)

            <tr>
                <td>{{ $trx->invoice_number }}</td>
                <td>
                    Rp {{ number_format($trx->total_amount) }}
                </td>
                <td>
                    {{ $trx->transaction_date }}
                </td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection