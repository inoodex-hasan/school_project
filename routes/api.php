<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StudentController as ApiStudentController;
use App\Http\Controllers\Api\ResultController as ApiResultController;
use App\Http\Controllers\Api\ClassRoutineController;
use App\Http\Controllers\Api\NoticeController;
use App\Http\Controllers\Api\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. You can add your own API
| routes here and they will be accessible via /api/*.
|
| Note: For production, you should use Laravel Sanctum or Passport for
| API authentication. Install with: composer require laravel/sanctum
|
*/

// Public Routes
Route::prefix('v1')->group(function () {
    // Authentication
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    // Public endpoints (no authentication required)
    Route::get('/notices', [NoticeController::class, 'index']);
    Route::get('/notices/{id}', [NoticeController::class, 'show']);

    Route::get('/events', [EventController::class, 'index']);
    Route::get('/events/{id}', [EventController::class, 'show']);

    Route::get('/teachers', [App\Http\Controllers\Api\TeacherController::class, 'index']);

    Route::get('/classes', [App\Http\Controllers\Api\SchoolClassController::class, 'index']);

    Route::get('/class-routines', [ClassRoutineController::class, 'index']);
    Route::get('/class-routines/{id}', [ClassRoutineController::class, 'show']);
});

// Protected Routes (Require Authentication)
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    // User profile
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Students
    Route::get('/students', [ApiStudentController::class, 'index']);
    Route::get('/students/{id}', [ApiStudentController::class, 'show']);
    Route::post('/students', [ApiStudentController::class, 'store']);
    Route::put('/students/{id}', [ApiStudentController::class, 'update']);
    Route::delete('/students/{id}', [ApiStudentController::class, 'destroy']);

    // Results
    Route::get('/results', [ApiResultController::class, 'index']);
    Route::get('/results/{id}', [ApiResultController::class, 'show']);
    Route::post('/results', [ApiResultController::class, 'store']);
    Route::put('/results/{id}', [ApiResultController::class, 'update']);
    Route::delete('/results/{id}', [ApiResultController::class, 'destroy']);

    // Class Routines (Protected)
    Route::post('/class-routines', [ClassRoutineController::class, 'store']);
    Route::put('/class-routines/{id}', [ClassRoutineController::class, 'update']);
    Route::delete('/class-routines/{id}', [ClassRoutineController::class, 'destroy']);

    // Notices (Protected)
    Route::post('/notices', [NoticeController::class, 'store']);
    Route::put('/notices/{id}', [NoticeController::class, 'update']);
    Route::delete('/notices/{id}', [NoticeController::class, 'destroy']);

    // Events (Protected)
    Route::post('/events', [EventController::class, 'store']);
    Route::put('/events/{id}', [EventController::class, 'update']);
    Route::delete('/events/{id}', [EventController::class, 'destroy']);
});
