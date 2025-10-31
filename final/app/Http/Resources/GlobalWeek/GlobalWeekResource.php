<?php

namespace App\Http\Resources\GlobalWeek;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GlobalWeekResource extends JsonResource
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
            'global_week_number' => $this->global_week_number,
            'global_week_type' => $this->global_week_type,
            'start_week_date' => $this->start_week_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
