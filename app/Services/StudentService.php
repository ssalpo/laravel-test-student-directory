<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    public function store(array $data): Student
    {
        return Student::create($data);
    }

    public function update(int $id, array $data): Student
    {
        $student = Student::findOrFail($id);

        $student->update($data);

        return $student;
    }

    public function destroy(int $id): Student
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return $student;
    }
}
