<div class="py-4">
    <div {{ $attributes->merge(['class' => 'max-w-7xl p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700']) }}>
        <div class="flex justify-between">
            <div>
                @isset( $title )
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $title }}</h5>
                @endisset
            </div>
            <div>
                @isset( $action )
                    {{ $action }}
                @endisset
            </div>
        </div>
        <div class="text-gray-900 dark:text-gray-100">
            {{ $slot }}
        </div>
        @isset( $control )
            {{ $control }}
        @endisset
    </div>
</div>
