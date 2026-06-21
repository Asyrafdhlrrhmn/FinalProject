@extends('layouts.admin')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <x-admin.stat-card
        title="Total Penjualan"
        :value="'Rp '.number_format($totalSales)"
    />

</div>

<div class="bg-white p-5 rounded-lg mt-5">

    <canvas id="salesChart"></canvas>

</div>

<div class="bg-white mt-5 rounded-lg shadow">

    <table class="table-auto w-full">

        <thead>
            <tr>
                <th>Produk</th>
                <th>Cabang</th>
                <th>Stok</th>
            </tr>
        </thead>

        <tbody>

            @foreach($lowStocks as $item)

            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->branch->name }}</td>
                <td>{{ $item->stock }}</td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx =
document.getElementById('salesChart');

new Chart(ctx,{
    type:'bar',
    data:{
        labels:[
            @foreach($salesPerBranch as $item)
            '{{ $item->name }}',
            @endforeach
        ],
        datasets:[{
            label:'Penjualan',
            data:[
                @foreach($salesPerBranch as $item)
                {{ $item->total }},
                @endforeach
            ]
        }]
    }
});

</script>
@endsection