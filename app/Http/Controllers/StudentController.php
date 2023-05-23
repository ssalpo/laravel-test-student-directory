<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentSyncClassroomRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StudentController extends Controller
{
    public function __construct(
        public StudentService $studentService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return StudentResource::collection(
            Student::paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request): StudentResource
    {
        return StudentResource::make(
            $this->studentService->store(
                $request->validated()
            )
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): StudentResource
    {
        $student->load('classroom.lectures');

        return StudentResource::make($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, int $id): StudentResource
    {
        return StudentResource::make(
            $this->studentService->update($id, $request->validated())
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): void
    {
        $this->studentService->destroy($id);
    }
}
