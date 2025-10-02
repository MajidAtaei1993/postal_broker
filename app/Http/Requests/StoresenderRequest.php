<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSenderRequest extends FormRequest
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
            'full_name' => ['required', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'regex:/^09\d{9}$/'], // starts with 09 and followed by 9 digits
            'address' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'regex:/^\d{10}$/'], // exactly 10 digits
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'full_name.required' => 'Please enter the sender\'s name.',
            'full_name.string' => 'The sender\'s name must be a string.',
            'full_name.max' => 'The sender\'s name cannot exceed 100 characters.',

            'phone.string' => 'The phone number must be a string.',
            'phone.regex' => 'The phone number must start with 09 and be exactly 11 digits.',

            'address.required' => 'Please enter the sender\'s address.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address cannot exceed 255 characters.',

            'zip_code.required' => 'Please enter the sender\'s postal code.',
            'zip_code.string' => 'The postal code must be a string.',
            'zip_code.regex' => 'The postal code must be exactly 10 digits.',
        ];
    }
}
