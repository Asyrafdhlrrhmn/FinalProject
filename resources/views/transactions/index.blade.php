@extends('layouts.admin')

@section('content')
<div class="container mx-auto">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Transaksi</h1>

        <a href="{{ route('transactions.create') }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">

            Tambah Transaksi

        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-300 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded shadow overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>

                    <th class="p-3">Invoice</th>
                    <th>Cabang</th>
                    <th>Kasir</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>

                </tr>

            </thead>

            <tbody>

            @forelse($transactions as $transaction)

                <tr class="border-b">

                    <td class="p-3">
                        {{ $transaction->invoice_number }}
                    </td>

                    <td>
                        {{ $transaction->branch->name }}
                    </td>

                    <td>
                        {{ $transaction->user->name }}
                    </td>

                    <td>
                        Rp {{ number_format($transaction->total_amount) }}
                    </td>

                    <td>
                        {{ $transaction->transaction_date }}
                    </td>

                    <td>

                        <a href="{{ route('transactions.show',$transaction->id) }}"
                            class="text-blue-600">

                            Detail

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center p-4">
                        Belum ada transaksi
                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="mt-5">

        {{ $transactions->links() }}

    </div>

</div>
@endsection