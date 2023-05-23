<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::resource('students', StudentController::class);

Route::get('classrooms/{classroom}/lectures', [ClassroomController::class, 'lectures']);
Route::post('classrooms/{classroom}/sync-lectures', [ClassroomController::class, 'syncLectures']);
Route::resource('classrooms', ClassroomController::class);

Route::resource('lectures', LectureController::class);
