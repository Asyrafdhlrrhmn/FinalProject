@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Tambah User
</h1>

<form
    action="{{ route('users.store') }}"
    method="POST"
    class="bg-white p-6 rounded-xl shadow">

    @csrf

    <div class="mb-4">
        <label>Nama</label>

        <input
            type="text"
            name="name"
            class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Email</label>

        <input
            type="email"
            name="email"
            class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Password</label>

        <input
            type="password"
            name="password"
            class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label>Role</label>

        <select
            name="role"
            class="w-full border rounded p-2">

            <option value="owner">Owner</option>
            <option value="manager">Manager</option>
            <option value="supervisor">Supervisor</option>
            <option value="cashier">Cashier</option>
            <option value="warehouse">Warehouse</option>

        </select>
    </div>

    <div class="mb-4">
        <label>Cabang</label>

        <select
            name="branch_id"
            class="w-full border rounded p-2">

            <option value="">
                Pilih Cabang
            </option>

            @foreach($branches as $branch)

                <option value="{{ $branch->id }}">
                    {{ $branch->name }}
                </option>

            @endforeach

        </select>
    </div>

    <button
        class="bg-blue-600 text-white px-4 py-2 rounded">

        Simpan

    </button>

</form>

@endsection