<?php

namespace App\Http\Resources\Week;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class WeekCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public $collects = WeekResource::class;

    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection, // This is where the individual resources are rendered
            'meta' => [
                'total_weeks' => $this->collection->count(),
            ],
        ];
    }
}
