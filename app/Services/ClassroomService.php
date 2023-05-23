<?php

namespace App\Services;

use App\Models\Classroom;
use Illuminate\Support\Collection;

class ClassroomService
{
    public function store(array $data): Classroom
    {
        return Classroom::create($data);
    }

    public function update(int $id, array $data): Classroom
    {
        $classroom = Classroom::findOrFail($id);

        $classroom->update($data);

        return $classroom;
    }

    public function destroy(int $id): Classroom
    {
        $classroom = Classroom::findOrFail($id);

        $classroom->delete();

        return $classroom;
    }

    public function syncLectures(int $id, array $data): void
    {
        $classroom = Classroom::findOrFail($id);

        $classroom->lectures()->sync(
            collect($data)
                ->keyBy('lecture')
                ->map(fn($item) => ['sort' => $item['sort']])
        );
    }
}
