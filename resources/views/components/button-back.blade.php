@props([
    'href'
])

<a href="{{ $href }}"
   {{ $attributes->merge(['class' => 'secondary-button']) }}
   title="{{ __('Back') }}">
    <x-svg svg="arrow-back-up" class="text-blue-600 dark:text-blue-500 -ms-1 mr-1 w-5 h-5"/>
    {{ __('Back') }}
</a>
