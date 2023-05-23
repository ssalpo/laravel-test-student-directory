<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequest;
use App\Http\Requests\ClassroomSyncLectureRequest;
use App\Http\Resources\ClassroomResource;
use App\Http\Resources\LectureResource;
use App\Models\Classroom;
use App\Models\Lecture;
use App\Services\ClassroomService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ClassroomController extends Controller
{
    public function __construct(
        public ClassroomService $classroomService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return ClassroomResource::collection(
            Classroom::paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request): ClassroomResource
    {
        return ClassroomResource::make(
            $this->classroomService->store(
                $request->validated()
            )
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom): ClassroomResource
    {
        $classroom->load('students');

        return ClassroomResource::make($classroom);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassroomRequest $request, int $id): ClassroomResource
    {
        return ClassroomResource::make(
            $this->classroomService->update($id, $request->validated())
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): void
    {
        $this->classroomService->destroy($id);
    }

    /**
     * Display a listing of the lectures.
     */
    public function lectures(Classroom $classroom): AnonymousResourceCollection
    {
        $classroom->load('lectures');

        return LectureResource::collection(
            $classroom->lectures
        );
    }

    /**
     * Sync specified list of lectures for classroom
     */
    public function syncLectures(ClassroomSyncLectureRequest $request, int $id): void
    {
        $this->classroomService->syncLectures($id, $request->validated('items'));
    }
}
