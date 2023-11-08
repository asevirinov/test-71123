<x-app-layout>
    <x-slot name="header">
        <h2 class="h2">
            {{ __('View') }} {{ $ship->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-3 flex justify-between">
                <x-button-back href="{{ route('ships.index') }}" class="mr-3"/>
                <x-button-create href="{{ route('ships.create') }}"/>
            </div>
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <div class="mb-3">
                        <span class="label">{{ __('Title') }}:</span>
                        <h3 class="h3">{{ $ship->title }}</h3>
                    </div>

                    @if($ship->description)
                        <div class="mb-3">
                            <span class="label">{{ __('Description') }}:</span>
                            <article class="prose dark:prose-invert">
                                {!! $ship->description !!}
                            </article>
                        </div>
                    @endif

                    @if($ship->spec)
                        <div class="mb-3">
                            <span class="label">{{ __('Spec') }}:</span>
                            <div class="table-wrapper">
                                <table class="table">
                                    @foreach($ship->spec as $key => $spec)
                                        @php($row_class = 'odd')
                                        @if(($key % 2) == 0)
                                            @php($row_class = 'even')
                                        @endif
                                        <tr class="{{ $row_class }}">
                                            <th scope="row"
                                                class="whitespace-nowrap px-3 py-2 font-medium text-gray-900 dark:text-white">
                                                {{ $spec['name'] }}
                                            </th>
                                            <td class="px-3 py-2">
                                                {{ $spec['value'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    @endif

                    <div class="mb-3">
                    <span class="label">{{ __('Ordering') }}:</span>
                    <div>{{ $ship->ordering }}</div>
                    </div>

                    <div class="mb-3">
                    <span class="label">{{ __('State') }}:</span>
                    <div class="flex justify-start">
                        <x-badge-status value="{{ $ship->state }}"/>
                    </div>
                    </div>
                </div>
            </div>
            <x-button-back href="{{ route('ships.index') }}" class="mt-3"/>
        </div>
    </div>
</x-app-layout>
