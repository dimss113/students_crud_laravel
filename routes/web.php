<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'name' => 'Dimas Fadilah',
        'role' => 'Staff',
        'buah' => ['Mangga', 'Jeruk', 'Apel', 'Anggur']
    ]);
});

// class, functionName
Route::get('/students', [StudentController::class, 'index2']);
Route::get('/student/{id}', [StudentController::class, 'show']);
Route::get('/student-add', [StudentController::class, 'create']);
// add post method
Route::post('/student', [StudentController::class, 'store']);
Route::get('/student-edit/{id}', [StudentController::class, 'edit']);
Route::put('/student/{id}', [StudentController::class, 'update']);
Route::get('/student-delete/{id}', [StudentController::class, 'delete']);
Route::delete('/student-destroy/{id}', [StudentController::class, 'destroy']);

Route::get('/student-deleted', [StudentController::class, 'deletedStudent']);
Route::get('/student/{id}/restore', [StudentController::class, 'restore']);



Route::get('/class', [ClassController::class, 'index']);
Route::get('/class-detail/{id}', [ClassController::class, 'show']);
Route::get('/class-add', [ClassController::class, 'create']);
Route::post('/class', [ClassController::class, 'store']);
Route::get('/class-edit/{id}', [ClassController::class, 'edit']);
Route::put('/class/{id}', [ClassController::class, 'update']);
Route::get('/class-delete/{id}', [ClassController::class, 'delete']);
Route::delete('/class-destroy/{id}', [ClassController::class, 'destroy']);



Route::get('/ekskul', [ExtracurricularController::class, 'index']);
Route::get('/ekskul-detail/{id}', [ExtracurricularController::class, 'show']);
Route::get('/ekskul-add', [ExtracurricularController::class, 'create']);
Route::post('/ekskul', [ExtracurricularController::class, 'store']);
Route::get('/ekskul-edit/{id}', [ExtracurricularController::class, 'edit']);
Route::put('/ekskul/{id}', [ExtracurricularController::class, 'update']);


Route::get('/teacher', [TeacherController::class, 'index']);
Route::get('/teacher-detail/{id}', [TeacherController::class, 'show']);
Route::get('/teacher-add', [TeacherController::class, 'create']);
Route::post('/teacher', [TeacherController::class, 'store']);
Route::get('/teacher-edit/{id}', [TeacherController::class, 'edit']);
Route::put('/teacher/{id}', [TeacherController::class, 'update']);