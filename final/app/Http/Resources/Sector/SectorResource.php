<?php

namespace App\Http\Resources\Sector;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "sector_name"=> $this->sector_name,
            "year_id"=> $this->year_id,            
        ];
    }
}
