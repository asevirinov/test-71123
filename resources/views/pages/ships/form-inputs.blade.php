@php $editing = isset($ship) @endphp

<div class="mb-3">
    <x-inputs.text
        name="title"
        label="{{ __('Title') }}"
        :value="old('title', ($editing ? $ship->title : ''))"
        maxlength="255"
        placeholder="{{ __('Title') }}"
        required
    />
</div>

<div class="mb-3">
    <x-inputs.textarea
        name="description"
        class="text-editor"
        label="{{ __('Description') }}"
    >{{ old('description', ($editing ? $ship->description : '')) }}</x-inputs.textarea>
</div>

<div class="mb-3">
    <span class="label">{{ __('Spec') }}</span>
    @php($data = $ship->spec ?? [])
    @include('pages.ships.spec-builder', ['data' => $data])
</div>

<div class="mb-3">
    <x-inputs.number
        name="ordering"
        label="{{ __('Ordering') }}"
        :value="old('ordering', ($editing ? $ship->ordering : '9999'))"
        min="0"
        max="9999"
        placeholder="{{ __('Ordering') }}"
        required
    />
</div>

<div class="mb-3">
    <x-inputs.checkbox-toggle
        name="state"
        label="{{ __('State') }}"
        :checked="old('state', ($editing ? $ship->state : 1))"
    ></x-inputs.checkbox-toggle>
</div>

<x-init-text-editor/>
