<x-app-layout>
    <x-slot name="header">
        <h2 class="h2">
            {{ __('Ships Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-end mb-3">
                <x-button-create href="{{ route('ships-gallery.create') }}" class="mr-4 sm:mr-0"/>
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
                                    {{ __('Photo') }}
                                </th>
                                <th scope="col" class="px-4 py-2 text-right">
                                    {{ __('Ordering') }}
                                </th>
                                <th scope="col" class="px-4 py-2">
                                    <span class="sr-only">{{ __('Actions') }}</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse( $shipsGalleries as $shipsGallery )
                                <tr class="table-row">
                                    <th scope="row"
                                        class="px-4 py-2 font-medium text-gray-900 dark:text-white">
                                        {{ $shipsGallery->title ?? '-' }}
                                    </th>
                                    <td class="px-4 py-2">
                                        <figure x-data=""
                                                x-on:click.prevent="$dispatch('open-modal', 'gallery-{{ $shipsGallery->id }}')"
                                                class="cursor-zoom-in"
                                        >
                                            <img class="h-auto w-20 rounded-lg"
                                                 src="{{ $shipsGallery->url }}"
                                                 alt="{{ $shipsGallery->title }}">
                                        </figure>
                                        <x-modal name="gallery-{{ $shipsGallery->id }}" maxWidth="5xl">
                                            <img src="{{ $shipsGallery->url }}" alt="{{ $shipsGallery->title }}">
                                        </x-modal>
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        {{ $shipsGallery->ordering ?? '-' }}
                                    </td>
                                    <td class="px-4 py-2 text-right">
                                        <div class="flex justify-end items-center"
                                             role="group"
                                             aria-label="{{ __('Actions') }}">
                                            <x-button-view :route="route('ships-gallery.show', $shipsGallery)" class="mr-1"/>
                                            <x-button-edit :route="route('ships-gallery.edit', $shipsGallery)" class="mr-1"/>
                                            <x-button-delete :route="route('ships-gallery.destroy', $shipsGallery)"/>
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
                                    {!! $shipsGalleries->links() !!}
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
