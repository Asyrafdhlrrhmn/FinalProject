<aside class="w-64 bg-gray-900 text-white min-h-screen">

    <div class="p-6 text-2xl font-bold border-b border-gray-700">
        Mini Market
    </div>

    <nav class="mt-4">

        <ul class="space-y-2">

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center px-6 py-3 hover:bg-gray-700 transition">

                    <span class="mr-3">🏠</span>

                    Dashboard

                </a>
            </li>

            {{-- OWNER --}}
            @if(auth()->user()->role === 'owner')

                <li>
                    <a href="{{ route('branches.index') }}"
                       class="flex items-center px-6 py-3 hover:bg-gray-700 transition">

                        <span class="mr-3">🏢</span>

                        Cabang

                    </a>
                </li>

                <li>
                    <a href="{{ route('users.index') }}"
                      class="flex items-center px-6 py-3 hover:bg-gray-700 transition">

                        <span class="mr-3">👥</span>

                        User

                    </a>
                </li>

            @endif

            {{-- INVENTORY --}}
            @if(
                in_array(auth()->user()->role,
                ['owner','manager','supervisor','warehouse'])
            )

                <li>
                    <a href="#"
                       class="flex items-center px-6 py-3 hover:bg-gray-700 transition">

                        <span class="mr-3">📦</span>

                        Produk

                    </a>
                </li>

            @endif

            {{-- TRANSAKSI --}}
            @if(
                in_array(auth()->user()->role,
                ['owner','manager','cashier'])
            )

                <li>
                    <a href="#"
                       class="flex items-center px-6 py-3 hover:bg-gray-700 transition">

                        <span class="mr-3">🛒</span>

                        Transaksi

                    </a>
                </li>

            @endif

            {{-- ACTIVITY LOG --}}
            @if(auth()->user()->role === 'owner')

                <li>
                    <a
                        href="{{ route('activity-logs.index') }}"
                        class="flex items-center px-6 py-3 hover:bg-gray-700">

                        <span class="mr-3">📋</span>
                        Activity Log

                    </a>
                </li>
            @endif

        </ul>

    </nav>

    <div class="absolute bottom-0 w-full p-4 border-t border-gray-700 text-sm text-center">
        © 2026 Mini Market
    </div>

</aside>