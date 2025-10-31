<?php

namespace App\Http\Resources\Section;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
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
            "section_number"=> $this->section_number,
            "sector_id"=> $this->sector_id,
            "default_room_id"=> $this->default_room_id,
        ];
    }
}
