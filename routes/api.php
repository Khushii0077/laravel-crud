<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\StudentController;
use App\Models\Gender;
use App\Models\Course;
use App\Models\Skill;


Route::apiResource('students', StudentController::class);

Route::get('/genders', function () {
    return Gender::select(
        'id',
        DB::raw("CASE WHEN is_male = 1 THEN 'Male' ELSE 'Female' END as name")
    )->get();
});


Route::get('/courses', function () {
    return Course::select('id', 'course_name')->get();
});

Route::get('/skills', function () {
    return Skill::select('id', 'name')->get();
});