<x-app-layout>
    <x-slot name="header">
        <h2 class="h2">
            {{ __('Cabin Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end mb-3">
                <x-button-create href="{{ route('cabin-categories.create') }}"/>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 dark:text-gray-100">
                    <div class="table-wrapper">
                        <table class="table table-auto">
                            <thead class="table-head">
                            <tr>
                                <th scope="col" class="px-4 py-2">
                                    {{ __('Title') }}
                                </th>
                                <th scope="col" class="px-4 py-2">
                                    {{ __('Ship') }}
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
                            @forelse( $cabinCategories as $cabinCategory )
                                <tr class="table-row">
                                    <th scope="row"
                                        class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                                        {{ $cabinCategory->title ?? '-' }}
                                    </th>
                                    <td class="px-4 py-2">
                                        {{ $cabinCategory->ship->title ?? '-' }}
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $cabinCategory->vendor_code ?? '-' }}
                                    </td>
                                    <td class="px-4 py-2">
                                        {{ $cabinCategory->type->value ?? '-' }}
                                    </td>
                                    <td class="px-4 py-2">
                                        @include('pages.cabin-categories.partials.photos')
                                    </td>
                                    <td class="px-4 py-2">
                                        @include('pages.cabin-categories.partials.description')
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        {{ $cabinCategory->ordering ?? '-' }}
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <x-badge-status value="{{ $cabinCategory->state }}"/>
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        <div class="flex justify-end items-center"
                                             role="group"
                                             aria-label="{{ __('Actions') }}">
                                            <x-button-view :route="route('cabin-categories.show', $cabinCategory)"
                                                           class="mr-1"/>
                                            <x-button-edit :route="route('cabin-categories.edit', $cabinCategory)"
                                                           class="mr-1"/>
                                            <x-button-delete
                                                :route="route('cabin-categories.destroy', $cabinCategory)"/>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="table-row">
                                    <td colspan="8">
                                        {{ __('Not Found') }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="8">
                                    {!! $cabinCategories->links() !!}
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
