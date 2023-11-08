@props([
    'value'
])
<div class="flex justify-center">
@if($value == 1)
    <div class="m-1 inline-block rounded-full border border-green-700 bg-green-600 p-1 text-white">
        <x-svg svg="check" stroke="2"/>
    </div>
@else
    <div class="m-1 inline-block rounded-full border border-red-600 bg-red-500 p-1 text-white">
        <x-svg svg="x" stroke="2"/>
    </div>
@endif
</div>
