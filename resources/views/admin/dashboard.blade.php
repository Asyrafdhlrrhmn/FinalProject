@extends('layouts.admin')

@section('content')

<div class="p-6">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard
        </h1>
        <p class="text-gray-500">
            Ringkasan aktivitas sistem hari ini
        </p>
    </div>

    <!-- STAT CARD -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

        <x-admin.stat-card 
            title="Total Produk"
            value="120"
            description="+5 minggu ini"
            :icon='"
                <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"w-6 h-6 text-blue-500\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                    <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M20 13V7a2 2 0 00-2-2h-3\"/>
                </svg>
            "'
        />

        <x-admin.stat-card 
            title="Total User"
            value="89"
            description="+3 hari ini"
            :icon='"
                <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"w-6 h-6 text-green-500\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                    <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M5.121 17.804A9 9 0 1118.364 4.56\"/>
                </svg>
            "'
        />

        <x-admin.stat-card 
            title="Total Transaksi"
            value="350"
            description="+12 hari ini"
            :icon='"
                <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"w-6 h-6 text-purple-500\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                    <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 8c-1.657 0-3 .895-3 2\"/>
                </svg>
            "'
        />

        <x-admin.stat-card 
            title="Pendapatan"
            value="Rp 12.5jt"
            description="+8% bulan ini"
            :icon='"
                <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"w-6 h-6 text-yellow-500\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">
                    <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M12 8c-1.657 0-3 .895-3 2\"/>
                </svg>
            "'
        />

    </div>

    <!-- GRID CONTENT -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">

        <div class="bg-white shadow rounded-xl p-6">

            <h3 class="font-semibold text-lg mb-4">
                Aktivitas Terbaru
            </h3>

            <ul class="space-y-3 text-sm text-gray-600">

                <li class="border-b pb-2">
                    User baru <b>Andi</b> mendaftar
                </li>

                <li class="border-b pb-2">
                    Produk <b>Sepatu Nike</b> ditambahkan
                </li>

                <li class="border-b pb-2">
                    Transaksi <b>#TRX002</b> berhasil
                </li>

                <li>
                    User <b>Siti</b> melakukan pembelian
                </li>

            </ul>

        </div>


        <div class="bg-white shadow rounded-xl p-6 lg:col-span-2">

            <h3 class="font-semibold text-lg mb-4">
                Informasi Sistem
            </h3>

            <div class="grid grid-cols-2 gap-6 text-sm">

                <div>
                    <p class="text-gray-500">Versi Sistem</p>
                    <p class="font-semibold">1.0.0</p>
                </div>

                <div>
                    <p class="text-gray-500">Server Status</p>
                    <p class="text-green-600 font-semibold">Online</p>
                </div>

                <div>
                    <p class="text-gray-500">Total Admin</p>
                    <p class="font-semibold">3 Orang</p>
                </div>

                <div>
                    <p class="text-gray-500">Database</p>
                    <p class="font-semibold">Connected</p>
                </div>

            </div>

        </div>

    </div>

 <!-- TABLE -->
<x-admin.table title="Transaksi Terbaru">

<table class="w-full text-sm">

<thead class="border-b text-gray-600">
<tr>
<th class="py-2 text-left">ID</th>
<th class="py-2 text-left">User</th>
<th class="py-2 text-left">Produk</th>
<th class="py-2 text-left">Total</th>
<th class="py-2 text-left">Status</th>
</tr>
</thead>

<tbody class="text-gray-700">

<tr class="border-b">
<td class="py-3">TRX001</td>
<td>Andi</td>
<td>Sepatu Nike</td>
<td>Rp750.000</td>
<td class="text-green-600 font-semibold">Selesai</td>
</tr>

<tr class="border-b">
<td class="py-3">TRX002</td>
<td>Budi</td>
<td>Adidas Hoodie</td>
<td>Rp550.000</td>
<td class="text-yellow-500 font-semibold">Proses</td>
</tr>

<tr>
<td class="py-3">TRX003</td>
<td>Siti</td>
<td>Puma T-Shirt</td>
<td>Rp250.000</td>
<td class="text-red-500 font-semibold">Batal</td>
</tr>

</tbody>

</table>

</x-admin.table>

</div>

@endsection
