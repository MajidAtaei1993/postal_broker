<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Shipment;
use App\Models\Package;
use App\Models\User;

class StoreshipmentRequest extends FormRequest
{
    /**
     * Always authorize request
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [
            'sender_id'   => ['required', 'integer', Rule::exists(User::class, 'id')],
            'receiver_id' => ['required', 'integer', Rule::exists(User::class, 'id')],
            
            // packages must be array of integers
            'package_ids'   => ['required', 'array'],
            'package_ids.*' => ['integer', Rule::exists(Package::class, 'id')],
            
            'service_type' => ['required', 'string', Rule::in(Shipment::SERVICE_TYPES)],
            'status'       => ['required', 'string', Rule::in(Shipment::STATUSES)],
        ];
    }

    /**
     * Custom messages
     */
    public function messages(): array
    {
        return [
            'sender_id.required'   => 'Please provide sender information.',
            'sender_id.exists'     => 'The selected sender does not exist.',

            'receiver_id.required' => 'Please provide receiver information.',
            'receiver_id.exists'   => 'The selected receiver does not exist.',

            'package_ids.required'   => 'Please provide at least one package.',
            'package_ids.array'      => 'Package IDs must be an array.',
            'package_ids.*.integer'  => 'Each package ID must be a number.',
            'package_ids.*.exists'   => 'One or more selected packages do not exist.',

            'service_type.required' => 'Please select the service type.',
            'service_type.in'       => 'Invalid service type selected.',

            'status.required' => 'Please select the shipment status.',
            'status.in'       => 'Invalid status selected.',
        ];
    }
}
