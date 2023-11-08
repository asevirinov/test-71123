@props([
    'route'
])

<a href="{{ $route }}"
   {{ $attributes->merge(['class' => 'leading-none']) }}
   title="{{ __('View') }}">
    <x-svg svg="eye" class="text-green-600 w-5 h-5"/>
    <span class="sr-only">{{ __('View') }}</span>
</a>
