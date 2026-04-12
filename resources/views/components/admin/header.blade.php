<header class="bg-white shadow p-4 flex justify-between items-center">
    <div>
        <h1 class="text-xl font-bold text-gray-800">
            Admin Dashboard
        </h1>
        <p class="text-sm text-gray-500">
            Selamat datang di sistem
        </p>
    </div>

    <div class="flex items-center gap-4">

        <div class="text-right">
            <p class="text-sm font-semibold text-gray-700">
                {{ Auth::user()->name ?? 'Admin' }}
            </p>
            <p class="text-xs text-gray-500">
                Administrator
            </p>
        </div>

        <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
            <span class="text-sm font-bold text-white">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </span>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="text-sm text-red-500 hover:text-red-700">
                Logout
            </button>
        </form>

    </div>

</header>