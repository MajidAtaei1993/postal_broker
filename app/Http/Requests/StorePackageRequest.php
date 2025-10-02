<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
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
            'weight' => ['required', 'numeric', 'min:0.1'],
            'length' => ['required', 'numeric', 'min:1'],
            'width' => ['required', 'numeric', 'min:1'],
            'height' => ['required', 'numeric', 'min:1'],
            'package_type' => ['required', 'string', 'max:50'],
            'contents' => ['nullable', 'string', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'weight.required' => 'Please enter the package weight.',
            'weight.numeric' => 'The package weight must be a number.',
            'weight.min' => 'The package weight cannot be less than 0.1.',

            'length.required' => 'Please enter the package length.',
            'length.numeric' => 'The package length must be a number.',
            'length.min' => 'The package length cannot be less than 1.',

            'width.required' => 'Please enter the package width.',
            'width.numeric' => 'The package width must be a number.',
            'width.min' => 'The package width cannot be less than 1.',

            'height.required' => 'Please enter the package height.',
            'height.numeric' => 'The package height must be a number.',
            'height.min' => 'The package height cannot be less than 1.',

            'package_type.required' => 'Please specify the package type.',
            'package_type.string' => 'The package type must be a string.',
            'package_type.max' => 'The package type cannot exceed 50 characters.',

            'contents.string' => 'The package contents description must be a string.',
            'contents.max' => 'The package contents description cannot exceed 255 characters.'
        ];
    }

}
