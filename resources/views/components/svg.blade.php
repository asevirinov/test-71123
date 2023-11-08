@props([
    'svg',
    'stroke' => 1,
    'size' => 16
])
<svg {{ $attributes }} width="{{ $size }}" height="{{ $size }}" stroke-width="{{ $stroke }}">
    <use xlink:href="{{ asset('tabler-sprite-nostroke.svg').'#tabler-'.$svg }}" />
</svg>
