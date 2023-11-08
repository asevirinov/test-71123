@props([
    'name',
    'label',
    'type' => 'text',
])

@if($label ?? null)
    @include('components.inputs.partials.label')
@endif

<select
    id="{{ $name }}"
    name="{{ $name }}"
    {{ ($required ?? false) ? 'required' : '' }}
    {{ $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) }}
    autocomplete="off"
>{{ $slot }}</select>

@error($name)
    @include('components.inputs.partials.error')
@enderror
