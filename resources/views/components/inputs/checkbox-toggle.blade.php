@props([
    'id',
    'name',
    'label',
    'value',
    'checked' => false,
    'addHiddenValue' => true,
    'hiddenValue' => 0,
])

@php
    $checked = !! $checked
@endphp

<div {{ $attributes->merge(['class' => 'relative block mb-2']) }}>

    {{-- Adds a hidden default value to be send if checked is false --}}
    @if($addHiddenValue)
    <input type="hidden" id="{{  $id ?? $name }}-hidden" name="{{ $name }}" value="{{ $hiddenValue }}">
    @endif

    @if($label ?? null)
        <label class="relative inline-flex items-center cursor-pointer" for="{{ $id ?? $name }}">
            <input
                type="checkbox"
                id="{{ $id ?? $name }}"
                name="{{ $name }}"
                value="{{ $value ?? 1 }}"
                {{ $checked ? 'checked' : '' }}
                class="sr-only peer"
            >
            <div class="w-11 h-6 bg-red-700 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-red-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-500"></div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-slate-400">{{ $label }}</span>
        </label>
    @endif
</div>

@error($name)
    @include('components.inputs.partials.error')
@enderror
