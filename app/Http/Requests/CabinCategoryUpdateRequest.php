<?php

namespace App\Http\Requests;

use App\Enums\CabinCategoryType;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CabinCategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255', 'string'],
            'vendor_code' => ['required', 'max:10', 'string'],
            'type' => ['nullable', new Enum(CabinCategoryType::class)],
            'photos' => ['nullable', 'json'],
            'description' => ['required', 'string'],
            'ordering' => ['required', 'numeric'],
            'state' => ['required', 'boolean'],
        ];
    }
}
