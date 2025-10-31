<?php

namespace App\Http\Resources\Group;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GroupCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public $collects = GroupResource::class;
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
