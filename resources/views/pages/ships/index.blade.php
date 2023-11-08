<x-app-layout>
    <x-slot name="header">
        <h2 class="h2">
            {{ __('Ships') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end mb-3">
                <x-button-create href="{{ route('ships.create') }}" class="mr-4 sm:mr-0"/>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <div class="table-wrapper">
                        <table class="table">
                            <thead class="table-head">
                            <tr>
                                <th scope="col" class="px-4 py-2">
                                    {{ __('Title') }}
                                </th>
                                <th scope="col" class="px-4 py-2">
                                    {{ __('Spec') }}
                                </th>
                                <th scope="col" class="px-4 py-2">
                                    {{ __('Description') }}
                                </th>
                                <th scope="col" class="px-4 py-2 text-right">
                                    {{ __('Cabin Categories') }}
                                </th>
                                <th scope="col" class="px-4 py-2 text-right">
                                    {{ __('Ordering') }}
                                </th>
                                <th scope="col" class="px-4 py-2 text-center">
                                    {{ __('State') }}
                                </th>
                                <th scope="col" class="px-4 py-2">
                                    <span class="sr-only">{{ __('Actions') }}</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $ships as $ship )
                                <tr class="table-row">
                                    <th scope="row"
                                        class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                                        {{ $ship->title ?? '-' }}
                                    </th>
                                    <td class="px-4 py-2">
                                        @if($ship->spec)
                                            <x-secondary-button
                                                x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'ship-spec-{{ $ship->id }}')"
                                            >{{ __('View') }}</x-secondary-button>
                                            <x-modal name="ship-spec-{{ $ship->id }}">
                                                <div class="p-5">
                                                    <h3 class="h3">{{ __('Spec') }} {{ $ship->title ?? '-' }}</h3>
                                                    <div class="table-wrapper">
                                                        <table class="table">
                                                            @foreach($ship->spec as $key => $spec)
                                                                @php($row_class = 'odd')
                                                                @if(($key % 2) == 0)
                                                                    @php($row_class = 'even')
                                                                @endif
                                                                <tr class="{{ $row_class }}">
                                                                    <th scope="row"
                                                                        class="px-3 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                            </x-modal>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">
                                        <x-secondary-button
                                            x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'ship-description-{{ $ship->id }}')"
                                        >{{ __('View') }}</x-secondary-button>
                                        <x-modal name="ship-description-{{ $ship->id }}">
                                            <div class="p-5">
                                                <h3 class="h3">{{ __('Description') }} {{ $ship->title ?? '-' }}</h3>
                                                <article class="prose dark:prose-invert">
                                                    {!! $ship->description ?? '-' !!}
                                                </article>
                                            </div>
                                        </x-modal>
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        {{ $ship->cabin_categories_count ?? '-' }}
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        {{ $ship->ordering ?? '-' }}
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <x-badge-status value="{{ $ship->state }}"/>
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        <div class="flex justify-end items-center"
                                             role="group"
                                             aria-label="{{ __('Actions') }}">
                                            <x-button-view :route="route('ships.show', $ship)" class="mr-1"/>
                                            <x-button-edit :route="route('ships.edit', $ship)" class="mr-1"/>
                                            <x-button-delete :route="route('ships.destroy', $ship)"/>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="table-row">
                                    <td colspan="6">
                                        {{ __('Not Found') }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="6">
                                    {!! $ships->links() !!}
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
