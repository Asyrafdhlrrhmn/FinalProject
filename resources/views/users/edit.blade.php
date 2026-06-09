@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Edit User
</h1>

<form
    action="{{ route('users.update',$user) }}"
    method="POST"
    class="bg-white p-6 rounded-xl shadow">

    @csrf
    @method('PUT')

    <div class="mb-4">

        <label>Nama</label>

        <input
            type="text"
            name="name"
            value="{{ $user->name }}"
            class="w-full border rounded p-2">

    </div>

    <div class="mb-4">

        <label>Email</label>

        <input
            type="email"
            name="email"
            value="{{ $user->email }}"
            class="w-full border rounded p-2">

    </div>

    <div class="mb-4">

        <label>Role</label>

        <select
            name="role"
            class="w-full border rounded p-2">

            @foreach([
                'owner',
                'manager',
                'supervisor',
                'cashier',
                'warehouse'
            ] as $role)

                <option
                    value="{{ $role }}"
                    {{ $user->role == $role ? 'selected' : '' }}>

                    {{ ucfirst($role) }}

                </option>

            @endforeach

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

                <option
                    value="{{ $branch->id }}"
                    {{ $user->branch_id == $branch->id ? 'selected' : '' }}>

                    {{ $branch->name }}

                </option>

            @endforeach

        </select>

    </div>

    <button
        class="bg-blue-600 text-white px-4 py-2 rounded">

        Update

    </button>

</form>

@endsection