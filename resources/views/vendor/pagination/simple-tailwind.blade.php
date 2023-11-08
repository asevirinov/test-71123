@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-between mt-3">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="secondary-button cursor-not-allowed">
                <x-svg svg="chevron-left-pipe" class="w-5 h-5"/>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="secondary-button">
                <x-svg svg="chevron-left" class="w-5 h-5"/>
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="secondary-button">
                <x-svg svg="chevron-right" class="w-5 h-5"/>
            </a>
        @else
            <span class="secondary-button cursor-not-allowed">
                <x-svg svg="chevron-right-pipe" class="w-5 h-5"/>
            </span>
        @endif
    </nav>
@endif
