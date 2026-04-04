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
    <aside class="w-64 bg-gray-800 text-white min-h-screen p-4">

        <h2 class="text-xl font-bold mb-6">
            Admin Panel
        </h2>

        <ul class="space-y-2">

            <li>
                <a href="/admin" class="block p-2 rounded hover:bg-gray-700">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="#" class="block p-2 rounded hover:bg-gray-700">
                    Produk
                </a>
            </li>

            <li>
                <a href="#" class="block p-2 rounded hover:bg-gray-700">
                    Transaksi
                </a>
            </li>

            <li>
                <a href="#" class="block p-2 rounded hover:bg-gray-700">
                    Laporan
                </a>
            </li>

        </ul>

    </aside>


    <!-- Main -->
    <div class="flex-1 flex flex-col">

        <!-- Header -->
        <header class="bg-white shadow p-4 flex justify-between">

            <h1 class="text-xl font-bold">
                Admin Dashboard
            </h1>

            <div>
                Admin
            </div>

        </header>


        <!-- Content -->
        <main class="p-6 flex-1">

            @yield('content')

        </main>


        <!-- Footer -->
        <footer class="bg-white p-4 text-center text-sm text-gray-500">

            © 2026 Admin Panel

        </footer>

    </div>

</div>

</body>
</html>
