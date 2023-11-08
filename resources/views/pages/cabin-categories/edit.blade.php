<x-app-layout>
    <x-slot name="header">
        <h2 class="h2">
            {{ __('Editing') }} {{ $cabinCategory->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-3 flex justify-between">
                <x-button-back href="{{ route('cabin-categories.index') }}" class="mr-3"/>
                <x-button-create href="{{ route('cabin-categories.create') }}"/>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <x-form
                        method="PUT"
                        action="{{ route('cabin-categories.update', $cabinCategory) }}"
                        class="mt-4"
                    >
                        @include('pages.cabin-categories.form-inputs')

                        <div class="flex justify-between">
                            <x-button-back href="{{ route('cabin-categories.index') }}"/>
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </x-form>
                </div>
            </div>
{{--            <livewire:ship-cabin-categories-detail :ship="$ship" />--}}
        </div>
    </div>
</x-app-layout>
