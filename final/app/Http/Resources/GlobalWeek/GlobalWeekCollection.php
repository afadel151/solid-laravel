<?php

namespace App\Http\Resources\GlobalWeek;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GlobalWeekCollection extends ResourceCollection
{
    public $collects = GlobalWeekResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'data' => $this->collection, // This is where the individual resources are rendered
            // 'links' => [
            //     'self' => route('global_weeks.index'),
            // ],
            'meta' => [
                'total_global_weeks' => $this->collection->count(),
            ],
        ];
    }
}
