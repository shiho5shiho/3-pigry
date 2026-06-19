<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeightResource extends JsonResource
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
            'recorded_date' => $this->recorded_date,
            'weight' => $this->weight,
            'user' => [
                'id' => $this->user_id,
                'name' => $this->user->name,
            ],
            'created_at' => $this->created_at->toISO8601String(),
        ];
    }
}
