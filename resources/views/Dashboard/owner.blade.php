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

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <x-admin.stat-card
        title="Total Cabang"
        :value="$totalBranches"
        description="Cabang aktif"
        color="text-green-500"
        icon='<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 7h18M5 7v10h14V7"/>
              </svg>'
    />

    <x-admin.stat-card
        title="Total User"
        :value="$totalUsers"
        description="Pengguna terdaftar"
        color="text-blue-500"
        icon='<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5V4H2v16h5"/>
              </svg>'
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

                    @forelse($recentActivities as $activity)

                    <tr class="border-b">

                        <td class="p-3">
                            {{ $activity->user->name }}
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

@endsection