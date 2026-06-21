@extends('layouts.admin')

@section('content')

<form method="GET">

    <div class="flex gap-3">

        <input
            type="date"
            name="start_date"
            class="border rounded p-2">

        <input
            type="date"
            name="end_date"
            class="border rounded p-2">

        <button
            class="bg-blue-600 text-white px-4 py-2 rounded">

            Filter

        </button>

        <a href="{{ route('reports.sales.pdf',request()->all()) }}"
           class="bg-red-600 text-white px-4 py-2 rounded">

            Export PDF

        </a>

    </div>

</form>

<div class="bg-white rounded-lg mt-5 shadow">

    <table class="w-full">

        <thead>
            <tr>
                <th>Invoice</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>

        <tbody>

            @foreach($sales as $sale)

            <tr>
                <td>{{ $sale->invoice_number }}</td>
                <td>
                    Rp {{ number_format($sale->total_amount) }}
                </td>
                <td>
                    {{ $sale->transaction_date }}
                </td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection