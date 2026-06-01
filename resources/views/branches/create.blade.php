@extends('layouts.admin')

@section('content')

<h1 class="text-3xl font-bold mb-6">
    Tambah Cabang
</h1>

<form
    action="{{ route('branches.store') }}"
    method="POST"
    class="bg-white p-6 rounded-xl shadow">

    @csrf

    <div class="mb-4">

        <label class="block mb-2">
            Nama Cabang
        </label>

        <input
            type="text"
            name="name"
            class="w-full border rounded-lg p-2">

    </div>

    <div class="mb-4">

        <label class="block mb-2">
            Kota
        </label>

        <input
            type="text"
            name="city"
            class="w-full border rounded-lg p-2">

    </div>

    <div class="mb-4">

        <label class="block mb-2">
            Alamat
        </label>

        <textarea
            name="address"
            class="w-full border rounded-lg p-2"></textarea>

    </div>

    <button
        class="bg-blue-600 text-white px-4 py-2 rounded-lg">

        Simpan

    </button>

</form>

@endsection