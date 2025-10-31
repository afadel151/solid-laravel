<?php

namespace App\Http\Resources\Group;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GroupResource extends JsonResource
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
            "group_number"=> $this->group_number,
            "section_id"=> $this->section_id,
            "nb_students"=> $this->nb_students,
            "default_room_id"=> $this->default_room_id,
        ];
    }
}
