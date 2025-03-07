<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculateProductPriceRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'tax_number' => ['required', 'regex:/^(DE|IT|GR)\d+$/']
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Выберите продукт',
            'tax_number.regex' => 'Номер налога должен начинаться с DE, IT или GR и содержать только цифры после этого.',
            'tax_number.required' => 'Укажите налоговый номер'
        ];
    }
}
