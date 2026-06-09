@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>
        <h1 class="text-3xl font-bold">
            Manajemen Cabang
        </h1>

        <p class="text-gray-500">
            Kelola seluruh cabang minimarket
        </p>
    </div>

</div>

<div class="flex justify-between items-center mb-4">

    <div class="flex gap-2">

        <a
            href="{{ route('reports.branches') }}"
            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">

            Export PDF

        </a>

        <a
            href="{{ route('branches.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">

            + Tambah Cabang

        </a>

    </div>

    <form
        action="{{ route('branches.index') }}"
        method="GET">

        <div class="flex gap-2">

            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Cari cabang, kota, atau alamat..."
                class="border rounded-lg px-4 py-2 w-80">

            <button
                type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">

                Cari

            </button>

        </div>

    </form>

</div>

<x-admin.table title="Daftar Cabang">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="p-3 text-left">No</th>
                    <th class="p-3 text-left">Nama Cabang</th>
                    <th class="p-3 text-left">Kota</th>
                    <th class="p-3 text-left">Alamat</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($branches as $branch)

                <tr class="border-b">

                    <td class="p-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="p-3">
                        {{ $branch->name }}
                    </td>

                    <td class="p-3">
                        {{ $branch->city }}
                    </td>

                    <td class="p-3">
                        {{ $branch->address }}
                    </td>

                    <td class="p-3 text-center">

                        <a href="{{ route('branches.edit', $branch) }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded">
                            Edit
                        </a>

                        <form
                            action="{{ route('branches.destroy', $branch) }}"
                            method="POST"
                            class="inline">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Yakin hapus cabang?')"
                                class="bg-red-600 text-white px-3 py-1 rounded">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="p-4 text-center">
                        Belum ada data cabang
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</x-admin.table>

@endsection