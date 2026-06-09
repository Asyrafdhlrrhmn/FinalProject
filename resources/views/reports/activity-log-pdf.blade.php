<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Activity Log Report</title>

    <style>

        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background: #eeeeee;
        }

        h2 {
            text-align: center;
        }

    </style>

</head>

<body>
    <h2>Mini Market Management System</h2>
    <h3>Laporan Activity Log</h3>

    <p>
        Dicetak pada :
        {{ now()->format('d M Y H:i') }}
    </p>


    <table>

        <thead>

            <tr>
                <th>User</th>
                <th>Aktivitas</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
            </tr>

        </thead>

        <tbody>

            @foreach($logs as $log)

            <tr>

                <td>
                    {{ $log->user->name ?? '-' }}
                </td>

                <td>
                    {{ $log->activity }}
                </td>

                <td>
                    {{ $log->description }}
                </td>

                <td>
                    {{ $log->created_at->format('d M Y H:i') }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>