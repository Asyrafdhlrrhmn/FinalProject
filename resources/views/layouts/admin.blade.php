<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 fixed h-full">
        <x-admin.sidebar />
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col ml-64">

        <!-- Header -->
        <x-admin.header />

        <!-- Content -->
        <main class="flex-1 p-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <x-admin.footer />

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
