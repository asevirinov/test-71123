<x-app-layout>
    <x-slot name="header">
        <h2 class="h2">
            {{ __('Editing') }} {{ $ship->title }}
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
                    <x-form
                        method="PUT"
                        action="{{ route('ships.update', $ship) }}"
                    >
                        <div x-data="{ current: 1 }">
                            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                                <ul class="-mb-px flex flex-wrap text-center text-sm font-medium"
                                    data-tabs-toggle="#ships-tab-content"
                                    role="tablist">
                                    <li class="mr-2" role="presentation">
                                        <button x-on:click="current = 1"
                                                :class="{
                                                    'tab active': current === 1,
                                                    'tab': current !== 1
                                                }"
                                                type="button" role="tab" :aria-selected="current === 1">
                                            {{ __('Main') }}
                                        </button>
                                    </li>
                                    <li class="mr-2" role="presentation">
                                        <button x-on:click="current = 2"
                                                :class="{
                                                    'tab active': current === 2,
                                                    'tab': current !== 2
                                                }"
                                                type="button" role="tab" :aria-selected="current === 2">
                                            {{ __('Cabin Categories') }}
                                        </button>
                                    </li>
                                    <li class="mr-2" role="presentation">
                                        <button x-on:click="current = 3"
                                                :class="{
                                                    'tab active': current === 3,
                                                    'tab': current !== 3
                                                }"
                                                type="button" role="tab" :aria-selected="current === 3">
                                            {{ __('Ships Gallery') }}
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div id="ships-tab-content">
                                <div x-show="current === 1">
                                    @include('pages.ships.form-inputs')
                                </div>
                                <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-800" x-show="current === 2">
                                    <div class="table-wrapper">
                                        <table class="table">
                                            <thead class="table-head">
                                            <tr>
                                                <th scope="col" class="px-4 py-2">
                                                    {{ __('Title') }}
                                                </th>
                                                <th scope="col" class="px-4 py-2">
                                                    {{ __('Vendor Code') }}
                                                </th>
                                                <th scope="col" class="px-4 py-2">
                                                    {{ __('Type') }}
                                                </th>
                                                <th scope="col" class="px-4 py-2">
                                                    {{ __('Photos') }}
                                                </th>
                                                <th scope="col" class="px-4 py-2">
                                                    {{ __('Description') }}
                                                </th>
                                                <th scope="col" class="px-4 py-2">
                                                    <span class="sr-only">{{ __('Actions') }}</span>
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($ship->cabinCategories as $key => $cabinCategory)
                                                @php($row_class = 'odd')
                                                @if(($key % 2) == 0)
                                                    @php($row_class = 'even')
                                                @endif
                                                <tr class="{{ $row_class }}">
                                                    <th scope="row"
                                                        class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 dark:text-white">
                                                        {{ $cabinCategory['title'] }}
                                                    </th>
                                                    <td class="px-4 py-2">
                                                        {{ $cabinCategory['vendor_code'] }}
                                                    </td>
                                                    <td class="px-4 py-2">
                                                        {{ $cabinCategory['type'] }}
                                                    </td>
                                                    <td class="px-4 py-2">
                                                        @include('pages.cabin-categories.partials.photos')
                                                    </td>
                                                    <td class="px-4 py-2">
                                                        @include('pages.cabin-categories.partials.description')
                                                    </td>
                                                    <td class="px-4 py-2 text-right">
                                                        <div class="flex justify-end items-center"
                                                             role="group"
                                                             aria-label="{{ __('Actions') }}">
                                                            <x-button-edit
                                                                :route="route('cabin-categories.edit', $cabinCategory)"
                                                                class="mr-1"/>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-800" x-show="current === 3">
                                    <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                                        @foreach( $ship->shipGallery as $gallery )
                                            <figure x-data=""
                                                    x-on:click.prevent="$dispatch('open-modal', 'ship-gallery-{{ $gallery->id }}')"
                                                    class="cursor-zoom-in"
                                            >
                                                <img class="h-auto max-w-full rounded-lg"
                                                     src="{{ $gallery->url }}"
                                                     alt="{{ $gallery->title }}">
                                                <figcaption>{{ $gallery->title }}</figcaption>
                                            </figure>
                                            <x-modal name="ship-gallery-{{ $gallery->id }}" maxWidth="5xl">
                                                <img src="{{ $gallery->url }}" alt="{{ $gallery->title }}">
                                            </x-modal>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between">
                            <x-button-back href="{{ route('ships.index') }}"/>
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
