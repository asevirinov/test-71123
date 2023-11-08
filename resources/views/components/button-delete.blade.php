@props([
    'route'
])

<form action="{{ $route }}"
      method="POST" class="leading-none"
      onsubmit="return confirm('{{ __('Are you sure?') }}')"
>
    @csrf @method('DELETE')
    <button type="submit" {{ $attributes }} title="{{ __('Delete') }}">
        <x-svg svg="trash" class="w-5 h-5 text-red-700"/>
        <span class="sr-only">{{ __('Delete') }}</span>
    </button>
</form>
