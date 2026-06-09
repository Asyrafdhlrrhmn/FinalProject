<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">

<title>Data Cabang</title>

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

<h3>Laporan Data Cabang</h3>

<p>
    Dicetak :
    {{ now()->format('d M Y H:i') }}
</p>

<table>

    <thead>

        <tr>

            <th>No</th>
            <th>Nama Cabang</th>
            <th>Alamat</th>
            <th>Telepon</th>

        </tr>

    </thead>

    <tbody>

        @foreach($branches as $branch)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $branch->name }}
            </td>

            <td>
                {{ $branch->address }}
            </td>

            <td>
                {{ $branch->phone }}
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</body>

</html>