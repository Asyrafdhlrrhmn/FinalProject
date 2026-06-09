<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">

<title>Data User</title>

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

<h3>Laporan Data User</h3>

<p>
    Dicetak :
    {{ now()->format('d M Y H:i') }}
</p>

<table>

    <thead>

        <tr>

            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Cabang</th>

        </tr>

    </thead>

    <tbody>

        @foreach($users as $user)

        <tr>

            <td>
                {{ $loop->iteration }}
            </td>

            <td>
                {{ $user->name }}
            </td>

            <td>
                {{ $user->email }}
            </td>

            <td>
                {{ ucfirst($user->role) }}
            </td>

            <td>
                {{ $user->branch->name ?? '-' }}
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</body>

</html>