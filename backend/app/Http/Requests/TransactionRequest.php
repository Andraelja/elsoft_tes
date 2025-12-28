<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'id' => 'nullable|uuid',
            'Company' => 'required|uuid',
            'CompanyName' => 'required|string|max:255',
            'Code' => 'nullable|string|max:100',
            'Date' => 'required|date',
            'Account' => 'required|uuid',
            'AccountName' => 'required|string|max:255',
            'Note' => 'nullable|string',
        ];
    }
}
