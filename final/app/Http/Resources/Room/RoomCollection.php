<?php

namespace App\Http\Resources\Room;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RoomCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public $collects = RoomResource::class;
    public function toArray(Request $request): array
    {
        return [
            "data" => $this->collection,
            "meta" => [
                "total" => $this->collection->count(),
            ],
        ];
    }
}
