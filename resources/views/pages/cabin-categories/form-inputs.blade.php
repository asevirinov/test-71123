@php $editing = isset($cabinCategory) @endphp

<div class="mb-3">
    <x-inputs.text
        name="title"
        label="{{ __('Title') }}"
        :value="old('title', ($editing ? $cabinCategory->title : ''))"
        maxlength="255"
        placeholder="{{ __('Title') }}"
        required
    />
</div>

<div class="grid gap-3 mb-3 sm:grid-cols-3">
    <div>
        <x-inputs.select name="ship_id" label="{{ __('Ship') }}" required>
            @php $selected = old('ship_id', ($editing ? $cabinCategory->ship_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>{{ __('Select') }}</option>
            @foreach( $ships as $value => $label )
                <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </div>

    <div>
        <x-inputs.text
            name="vendor_code"
            label="{{ __('Vendor Code') }}"
            :value="old('vendor_code', ($editing ? $cabinCategory->vendor_code : ''))"
            maxlength="10"
            placeholder="{{ __('Vendor Code') }}"
            required
        />
    </div>

    <div>
        <x-inputs.select name="type" label="{{ __('Type') }}">
            @php $selected = old('type', ($editing ? $cabinCategory->type->value : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>{{ __('Select') }}</option>
            @foreach(\App\Enums\CabinCategoryType::cases() as $case)
                <option value="{{ $case->value }}" {{ $selected == $case->value ? 'selected' : '' }} >{{ $case->value }}</option>
            @endforeach
        </x-inputs.select>
    </div>
</div>

<div class="mb-3">
    <x-inputs.textarea
        name="description"
        class="text-editor"
        label="{{ __('Description') }}"
    >{{ old('description', ($editing ? $cabinCategory->description : '')) }}</x-inputs.textarea>
</div>

<div class="mb-3">
    <span class="label">{{ __('Photos') }}</span>
    @php($data = $cabinCategory->photos ?? [])
    @include('pages.cabin-categories.photos-builder', ['data' => $data])
</div>

<div class="mb-3">
    <x-inputs.number
        name="ordering"
        label="{{ __('Ordering') }}"
        :value="old('ordering', ($editing ? $cabinCategory->ordering : '9999'))"
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
        :checked="old('state', ($editing ? $cabinCategory->state : 1))"
    ></x-inputs.checkbox-toggle>
</div>

<x-init-text-editor/>
