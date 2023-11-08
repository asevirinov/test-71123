@props([
    'route'
])

<a href="{{ $route }}"
   {{ $attributes->merge(['class' => 'leading-none']) }}
   title="{{ __('Edit') }}">
    <x-svg svg="edit" class="text-blue-600 w-5 h-5"/>
    <span class="sr-only">{{ __('Edit') }}</span>
</a>
