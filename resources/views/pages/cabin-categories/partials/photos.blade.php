@if($cabinCategory->photos)
    <x-secondary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'cabin-category-photos-{{ $cabinCategory->id }}')"
    >{{ __('View') }}</x-secondary-button>
    <x-modal name="cabin-category-photos-{{ $cabinCategory->id }}">
        <div class="p-5">
            <h3 class="h3">{{ __('Photos') }} {{ $cabinCategory->title ?? '-' }}</h3>
            <div class="grid grid-cols-1 gap-4"
                 x-data="{ photos: {{ json_encode($cabinCategory->photos) }} }">
                <template x-for="(photo, index) in photos" :key="index">
                    <figure>
                        <img :src="`${photo.url}`" class="rounded-md" alt="{{ $cabinCategory->title }}">
                    </figure>
                </template>
            </div>
        </div>
    </x-modal>
@endif
