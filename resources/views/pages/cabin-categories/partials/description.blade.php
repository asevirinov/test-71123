@if($cabinCategory->description)
    <x-secondary-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'cabin-category-description-{{ $cabinCategory->id }}')"
    >{{ __('View') }}</x-secondary-button>
    <x-modal name="cabin-category-description-{{ $cabinCategory->id }}">
        <div class="p-5">
            <h3 class="h3">{{ __('Description') }} {{ $cabinCategory->title ?? '-' }}</h3>
            <article class="prose dark:prose-invert">
                {!! $cabinCategory->description ?? '-' !!}
            </article>
        </div>
    </x-modal>
@endif
