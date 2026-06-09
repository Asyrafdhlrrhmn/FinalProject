@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-4">

    <div class="flex gap-2">

        <a
            href="{{ route('reports.users') }}"
            class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">

            Export PDF

        </a>

        <a
            href="{{ route('users.create') }}"
            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">

            + Tambah User

        </a>

    </div>

    <form
        action="{{ route('users.index') }}"
        method="GET">

        <div class="flex gap-2">

            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="Cari nama atau email..."
                class="border rounded-lg px-4 py-2 w-80">

            <button
                type="submit"
                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">

                Cari

            </button>

        </div>

    </form>

</div>

<x-admin.table title="Daftar User">

<table class="w-full">

    <thead class="bg-gray-100">

        <tr>
            <th class="p-3">Nama</th>
            <th class="p-3">Email</th>
            <th class="p-3">Role</th>
            <th class="p-3">Cabang</th>
            <th class="p-3">Aksi</th>
        </tr>

    </thead>

    <tbody>

        @foreach($users as $user)

        <tr class="border-b">

            <td class="p-3">
                {{ $user->name }}
            </td>

            <td class="p-3">
                {{ $user->email }}
            </td>

            <td class="p-3">
                {{ ucfirst($user->role) }}
            </td>

            <td class="p-3">
                {{ $user->branch?->name ?? '-' }}
            </td>

            <td class="p-3">

                <a href="{{ route('users.edit',$user) }}"
                   class="bg-yellow-500 text-white px-3 py-1 rounded">
                    Edit
                </a>

                <form
                    action="{{ route('users.destroy',$user) }}"
                    method="POST"
                    class="inline">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Hapus user?')"
                        class="bg-red-600 text-white px-3 py-1 rounded">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </tbody>

</table>

</x-admin.table>

@endsection