<?php

namespace App\Services;

use App\Models\Lecture;

class LectureService
{
    public function store(array $data): Lecture
    {
        return Lecture::create($data);
    }

    public function update(int $id, array $data): Lecture
    {
        $lecture = Lecture::findOrFail($id);

        $lecture->update($data);

        return $lecture;
    }

    public function destroy(int $id): Lecture
    {
        $lecture = Lecture::findOrFail($id);

        $lecture->delete();

        return $lecture;
    }
}
