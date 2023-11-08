<x-app-layout>
    <x-slot name="header">
        <h2 class="h2">
            {{ __('View') }} {{ $cabinCategory->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-3">
                        <span class="label">{{ __('Title') }}:</span>
                        <h3 class="h3">{{ $cabinCategory->title }}</h3>
                    </div>

                    <div class="mb-3">
                        <span class="label">{{ __('Ship') }}:</span>
                        <p>{{ $cabinCategory->ship->title }}</p>
                    </div>

                    <div class="mb-3">
                        <span class="label">{{ __('Vendor Code') }}:</span>
                        <p>{{ $cabinCategory->vendor_code }}</p>
                    </div>

                    <div class="mb-3">
                        <span class="label">{{ __('Type') }}:</span>
                        <p>{{ $cabinCategory->type->value }}</p>
                    </div>

                    @if($cabinCategory->description)
                        <div class="mb-3">
                            <span class="label">{{ __('Description') }}:</span>
                            <article class="prose dark:prose-invert">
                                {!! $cabinCategory->description !!}
                            </article>
                        </div>
                    @endif

                    @if($cabinCategory->photos)
                        <div class="mb-3">
                            <span class="label">{{ __('Photos') }}:</span>
                            <div class="grid grid-cols-1 gap-4">
                                @foreach($cabinCategory->photos as $key => $photo)
                                    <div>
                                        <img class="h-auto max-w-full rounded-lg"
                                             src="{{ $photo }}"
                                             alt="{{ $cabinCategory->title }}_{{ $cabinCategory->id }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                    <span class="label">{{ __('Ordering') }}:</span>
                    <div>{{ $cabinCategory->ordering }}</div>
                    </div>

                    <div class="mb-3">
                    <span class="label">{{ __('State') }}:</span>
                    <div class="flex justify-start">
                        <x-badge-status value="{{ $cabinCategory->state }}"/>
                    </div>
                    </div>
                </div>
            </div>
            <x-button-back href="{{ route('cabin-categories.index') }}" class="mt-3"/>
        </div>
    </div>
</x-app-layout>
