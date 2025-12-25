<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_id' => 'nullable|uuid',
            'item_type_id' => 'nullable|uuid',
            'item_group_id' => 'nullable|uuid',
            'item_account_group_id' => 'nullable|uuid',
            'item_unit_id' => 'nullable|uuid',
            'code' => 'required|string|unique:items,code,' . $this->route('item'),
            'label' => 'required|string',
            'is_active' => 'sometimes|boolean',
        ];
    }
}
