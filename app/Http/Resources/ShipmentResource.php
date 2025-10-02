<?php

namespace App\Http\Resources;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'sender' => new SenderResource($this->whenLoaded('sender')),
            'receiver' => new ReceiverResource($this->whenLoaded('receiver')),
            'packages'      => PackageResource::collection($this->whenLoaded('packages')),
            'tracking_code' => $this->tracking_code,
            'service_type' => $this->service_type,
            'status' => $this->status
        ];
    }
}
