<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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
            'customer_name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'in:pending,paid,cancelled'
        ];
    }
    
    public function messages(): array
    {
        return [
            'customer_name.required' => 'Customer name is required.',
            'customer_name.string'   => 'Customer name must be a valid string.',
            'customer_name.max'      => 'Customer name may not be longer than 255 characters.',

            'amount.required' => 'Invoice amount is required.',
            'amount.numeric'  => 'Invoice amount must be a number.',
            'amount.min'      => 'Invoice amount must be at least 0.',

            'status.in'       => 'Invoice status must be one of: pending, paid, or cancelled.',
        ];
    }
}
