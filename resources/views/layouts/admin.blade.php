<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="flex">

    <!-- Sidebar -->
    <x-admin.sidebar />

    <!-- Main -->
    <div class="flex-1 flex flex-col">

        <!-- Header -->
        <x-admin.header />

        <!-- Content -->
        <main class="p-6 flex-1">

            @yield('content')

        </main>

        <!-- Footer -->
        <x-admin.footer />

    </div>

</div>

</body>
</html>
