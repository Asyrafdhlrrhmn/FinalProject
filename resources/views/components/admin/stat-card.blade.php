<div class="bg-white shadow rounded-xl p-6 flex items-center justify-between
            hover:shadow-lg transition duration-300 transform hover:-translate-y-1">

    <div>
        <p class="text-gray-500 text-sm">
            {{ $title }}
        </p>

        <h2 class="text-3xl font-bold mt-1">
            {{ $value }}
        </h2>

        <span class="text-sm {{ $color ?? 'text-green-500' }}">
            {{ $description }}
        </span>
    </div>

    <div class="bg-gray-100 p-3 rounded-lg">
        {!! $icon !!}
    </div>

</div>
