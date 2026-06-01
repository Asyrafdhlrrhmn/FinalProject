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

    <a href="{{ route('branches.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
        + Tambah Cabang
    </a>

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