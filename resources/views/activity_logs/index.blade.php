@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-2">
    Activity Log
</h1>


<p class="text-gray-500 mb-6">
    Riwayat aktivitas seluruh pengguna
</p>

<a
    href="{{ route('reports.activity-log') }}"
    class="bg-red-500 text-white px-4 py-2 rounded"
>
    Export PDF
</a>


<x-admin.table title="Daftar Aktivitas">

<table class="w-full">

    <thead>
        <tr class="border-b">
            <th class="text-left p-3">User</th>
            <th class="text-left p-3">Aktivitas</th>
            <th class="text-left p-3">Deskripsi</th>
            <th class="text-left p-3">Tanggal</th>
        </tr>
    </thead>

    <tbody>

        @foreach($logs as $log)

        <tr class="border-b">

            <td class="p-3">
                {{ $log->user->name ?? '-' }}
            </td>

            <td class="p-3">
                {{ $log->activity }}
            </td>

            <td class="p-3">
                {{ $log->description }}
            </td>

            <td class="p-3">
                {{ $log->created_at->format('d M Y H:i') }}
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

<div class="mt-4">
    {{ $logs->links() }}
</div>

</x-admin.table>

@endsection