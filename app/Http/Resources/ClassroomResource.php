<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClassroomResource extends JsonResource
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
            'name' => $this->name,
            'students' => $this->whenLoaded(
                'students',
                fn() => StudentResource::collection($this->students)
            ),
            'lectures' => $this->whenLoaded(
                'lectures',
                fn() => LectureResource::collection($this->lectures)
            )
        ];
    }
}
