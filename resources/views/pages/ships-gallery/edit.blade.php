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
                                    @include('pages.cabin-categories.list')
                                </div>
                                <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-800" x-show="current === 3">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content
                                        the <strong
                                            class="font-medium text-gray-800 dark:text-white">Settings tab's associated
                                            content</strong>.
                                        Clicking another tab will toggle the visibility of this one for the next. The
                                        tab JavaScript swaps
                                        classes to control the content visibility and styling.</p>
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
