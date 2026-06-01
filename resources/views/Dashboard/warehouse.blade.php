@extends('layouts.admin')

@section('content')

<div class="bg-white rounded-lg shadow p-6">
    <h1 class="text-3xl font-bold mb-2">
        Dashboard Warehouse
    </h1>

    <p class="text-gray-500">
        Selamat datang, {{ auth()->user()->name }}
    </p>
</div>

@endsection