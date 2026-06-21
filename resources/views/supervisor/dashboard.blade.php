@extends('layouts.admin')

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

    <div class="bg-white p-5 rounded-lg shadow">

        <h3 class="font-bold mb-4">
            Monitoring Transaksi
        </h3>

        <table class="w-full">

            @foreach($latestTransactions as $trx)

            <tr>
                <td>{{ $trx->invoice_number }}</td>
                <td>Rp {{ number_format($trx->total_amount) }}</td>
            </tr>

            @endforeach

        </table>

    </div>

    <div class="bg-white p-5 rounded-lg shadow">

        <h3 class="font-bold mb-4">
            Monitoring Aktivitas
        </h3>

        <table class="w-full">

            @foreach($activities as $activity)

            <tr>
                <td>{{ $activity->description }}</td>
                <td>{{ $activity->created_at }}</td>
            </tr>

            @endforeach

        </table>

    </div>

</div>

@endsection