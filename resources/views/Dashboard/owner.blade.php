
@extends('layouts.admin')

@section('content')

<div class="mb-6">

    <h1 class="text-3xl font-bold">
        Dashboard Owner
    </h1>

    <p class="text-gray-500">
        Selamat datang, {{ auth()->user()->name }}
    </p>

</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">

    <x-admin.stat-card
        title="Total User"
        :value="$stats['users']"
        description="Pengguna sistem"
        color="text-blue-500"
        icon="👤"
    />

    <x-admin.stat-card
        title="Total Cabang"
        :value="$stats['branches']"
        description="Cabang aktif"
        color="text-green-500"
        icon="🏢"
    />

    <x-admin.stat-card
        title="Activity Log"
        :value="$stats['logs']"
        description="Riwayat aktivitas"
        color="text-purple-500"
        icon="📋"
    />

    <x-admin.stat-card
        title="Manager"
        :value="$stats['manager']"
        description="Total manager"
        color="text-orange-500"
        icon="👨‍💼"
    />

</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

    <x-admin.stat-card
        title="Supervisor"
        :value="$stats['supervisor']"
        description="User supervisor"
        color="text-blue-500"
        icon="🧑‍💼"
    />

    <x-admin.stat-card
        title="Cashier"
        :value="$stats['cashier']"
        description="User kasir"
        color="text-green-500"
        icon="💵"
    />

    <x-admin.stat-card
        title="Warehouse"
        :value="$stats['warehouse']"
        description="User gudang"
        color="text-yellow-500"
        icon="📦"
    />

</div>

<div class="mt-8">

    <div class="bg-white rounded-xl shadow">

        <div class="p-4 border-b">
            <h2 class="font-bold text-lg">
                Aktivitas Terakhir
            </h2>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="p-3 text-left">
                            User
                        </th>

                        <th class="p-3 text-left">
                            Aktivitas
                        </th>

                        <th class="p-3 text-left">
                            Deskripsi
                        </th>

                        <th class="p-3 text-left">
                            Waktu
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($activities as $activity)

                    <tr class="border-b">

                        <td class="p-3">
                            {{ $activity->user->name ?? '-' }}
                        </td>

                        <td class="p-3">
                            {{ $activity->activity }}
                        </td>

                        <td class="p-3">
                            {{ $activity->description }}
                        </td>

                        <td class="p-3">
                            {{ $activity->created_at->format('d M Y H:i') }}
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="4" class="p-4 text-center">
                            Belum ada aktivitas
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
<div class="mt-8">

    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-lg font-bold mb-4">
            Statistik User per Role
        </h2>

        <div style="height:220px;">
            <canvas id="roleChart"></canvas>
        </div>

    </div>

</div>

<div class="mt-8">

    <div class="bg-white p-6 rounded-xl shadow">

        <h2 class="text-lg font-bold mb-4">
            Aktivitas 7 Hari Terakhir
        </h2>

        <div style="height:300px;">
            <canvas id="activityChart"></canvas>
        </div>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const ctx = document.getElementById('roleChart');

    new Chart(ctx, {

        type: 'doughnut',

        data: {

            labels: [
                'Owner',
                'Manager',
                'Supervisor',
                'Cashier',
                'Warehouse'
            ],

            datasets: [{

            label: 'Jumlah User',

            data: @json($roleChart),

            backgroundColor: [
                '#3B82F6',
                '#10B981',
                '#F59E0B',
                '#EF4444',
                '#8B5CF6'
            ],

            borderWidth: 1

        }]
        },

        options: {

            responsive: true,
            maintainAspectRatio: false,

            scales: {

                y: {
                    beginAtZero: true
                }
            }
        }
    });

});

</script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const activityCtx =
        document.getElementById('activityChart');

    new Chart(activityCtx, {

        type: 'line',

        data: {

            labels: @json($activityLabels),

            datasets: [{

                label: 'Jumlah Aktivitas',

                data: @json($activityData),

                borderColor: '#3B82F6',

                fill: false,

                tension: 0.3

            }]
        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            scales: {

                y: {
                    beginAtZero: true
                }
            }
        }
    });

});

</script>
@endsection