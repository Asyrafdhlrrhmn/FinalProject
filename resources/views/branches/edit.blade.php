@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Edit Cabang
</h1>

<form
    action="{{ route('branches.update', $branch) }}"
    method="POST"
    class="bg-white p-6 rounded-xl shadow">

    @csrf
    @method('PUT')

    <div class="mb-4">

        <label class="block mb-2">
            Nama Cabang
        </label>

        <input
            type="text"
            name="name"
            value="{{ $branch->name }}"
            class="w-full border rounded-lg p-2">

    </div>

    <div class="mb-4">

        <label class="block mb-2">
            Kota
        </label>

        <input
            type="text"
            name="city"
            value="{{ $branch->city }}"
            class="w-full border rounded-lg p-2">

    </div>

    <div class="mb-4">

        <label class="block mb-2">
            Alamat
        </label>

        <textarea
            name="address"
            class="w-full border rounded-lg p-2">{{ $branch->address }}</textarea>

    </div>

    <button
        class="bg-blue-600 text-white px-4 py-2 rounded-lg">

        Update

    </button>

</form>

@endsection