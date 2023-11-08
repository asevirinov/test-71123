@props([
    'href'
])

<a href="{{ $href }}"
   {{ $attributes->merge(['class' => 'secondary-button']) }}
   title="{{ __('Create') }}">
    <x-svg svg="plus" class="text-green-600 dark:text-green-500 -ms-1 mr-1 w-5 h-5"/>
    {{ __('Create') }}
</a>
