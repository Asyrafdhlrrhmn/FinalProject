<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">

<title>Laporan Penjualan</title>

<style>

body{
    font-family:sans-serif;
    font-size:12px;
}

h2{
    text-align:center;
    margin-bottom:0;
}

h3{
    text-align:center;
    margin-top:5px;
}

p{
    text-align:right;
}

table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    border:1px solid black;
    padding:8px;
}

th{
    background:#eeeeee;
}

</style>

</head>

<body>

<h2>Mini Market Management System</h2>

<h3>Laporan Penjualan</h3>

<p>
    Dicetak :
    {{ now()->format('d M Y H:i') }}
</p>

<table>

    <thead>

        <tr>
            <th>No</th>
            <th>Invoice</th>
            <th>Total</th>
            <th>Tanggal</th>
        </tr>

    </thead>

    <tbody>

        @foreach($sales as $sale)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $sale->invoice_number }}
            </td>

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

</body>

</html>