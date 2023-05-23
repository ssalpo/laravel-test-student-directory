<?php

namespace App\Http\Controllers;

use App\Http\Requests\LectureRequest;
use App\Http\Resources\LectureResource;
use App\Models\Lecture;
use App\Services\LectureService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LectureController extends Controller
{
    public function __construct(
        public LectureService $lectureService
    )
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
        return LectureResource::collection(
            Lecture::paginate()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LectureRequest $request): LectureResource
    {
        return LectureResource::make(
            $this->lectureService->store(
                $request->validated()
            )
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecture $lecture): LectureResource
    {
        $lecture->load('classrooms.students');

        return LectureResource::make($lecture);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LectureRequest $request, int $id): LectureResource
    {
        return LectureResource::make(
            $this->lectureService->update($id, $request->validated())
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): void
    {
        $this->lectureService->destroy($id);
    }
}
