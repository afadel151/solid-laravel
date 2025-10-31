<?php

namespace App\Http\Resources\Timing;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TimingResource extends JsonResource
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
            "session_start"=> $this->session_start,
            "session_finish"=> $this->session_finish,
        ];
    }
}
