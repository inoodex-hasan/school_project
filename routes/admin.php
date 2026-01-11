<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountTypeController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MessageController;
use App\HTTP\Controllers\TeacherController;
use App\HTTP\Controllers\StudentController;
use App\HTTP\Controllers\EventController;
use App\Http\Controllers\ClassRoutineController;
use App\Http\Controllers\ExamRoutineController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamTypeController;
use App\Http\Controllers\ContactController;


// Protect all admin routes
Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Notices (resource)
    Route::resource('notices', NoticeController::class)->names('notices');

    // Slides (resource)
    Route::resource('slides', SlideController::class)->names('slides');

    // About
    Route::prefix('about')->name('about.')->group(function () {
        Route::get('/', [AboutController::class, 'index'])->name('index');
        Route::get('/create', [AboutController::class, 'create'])->name('create');
        Route::post('/store', [AboutController::class, 'store'])->name('store');
        Route::get('/{id}', [AboutController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AboutController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AboutController::class, 'update'])->name('update');
        Route::delete('/{id}', [AboutController::class, 'destroy'])->name('destroy');
    });
    // Exam Type
    Route::prefix('exam_type')->name('exam_type.')->group(function () {
        Route::get('/create', [ExamTypeController::class, 'create'])->name('create');
        Route::post('/store', [ExamTypeController::class, 'store'])->name('store');
        Route::get('/', [ExamTypeController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [ExamTypeController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ExamTypeController::class, 'update'])->name('update');
        Route::delete('/{id}', [ExamTypeController::class, 'destroy'])->name('destroy');
    });

    // Gallery
    Route::prefix('gallery')->name('gallery.')->group(function () {
        Route::get('/photos', [GalleryController::class, 'photos'])->name('photos');
        Route::get('/videos', [GalleryController::class, 'videos'])->name('videos');
        Route::get('/create', [GalleryController::class, 'create'])->name('create');
        Route::post('/store', [GalleryController::class, 'store'])->name('store');
        Route::get('/', [GalleryController::class, 'index'])->name('index');
        Route::delete('/{id}', [GalleryController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/edit', [GalleryController::class, 'edit'])->name('edit');
    });

    // Messages
    Route::prefix('messages')->name('messages.')->group(function () {
        Route::get('/create', [MessageController::class, 'create'])->name('create');
        Route::post('/store', [MessageController::class, 'store'])->name('store');
        Route::get('/', [MessageController::class, 'index'])->name('index');
        Route::delete('/{id}', [MessageController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/edit', [MessageController::class, 'edit'])->name('edit');
        Route::get('/{id}', [MessageController::class, 'show'])->name('show');
        Route::put('/{id}', [MessageController::class, 'update'])->name('update');
    });


    // Teachers
    Route::prefix('teachers')->name('teachers.')->group(function () {
        Route::get('/create', [TeacherController::class, 'create'])->name('create');
        Route::get('/', [TeacherController::class, 'index'])->name('index');
        Route::post('/', [TeacherController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TeacherController::class, 'update'])->name('update');
        Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('destroy');
    });

    // Students
    Route::prefix('students')->name('students.')->group(function () {
        Route::get('/create', [StudentController::class, 'create'])->name('create');
        Route::get('/', [StudentController::class, 'index'])->name('index');
        Route::post('/', [StudentController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');
        Route::put('/{id}', [StudentController::class, 'update'])->name('update');
        Route::delete('/{id}', [StudentController::class, 'destroy'])->name('destroy');
    });

    // Events
    Route::prefix('events')->name('events.')->group(function () {
        Route::get('/create', [EventController::class, 'create'])->name('create');
        Route::get('/', [EventController::class, 'index'])->name('index');
        Route::post('/', [EventController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [EventController::class, 'edit'])->name('edit');
        Route::put('/{id}', [EventController::class, 'update'])->name('update');
        Route::delete('/{id}', [EventController::class, 'destroy'])->name('destroy');
    });

    // Class Routine
    Route::prefix('class_routine')->name('class_routine.')->group(function () {
        Route::get('/create', [ClassRoutineController::class, 'create'])->name('create');
        Route::post('/store', [ClassRoutineController::class, 'store'])->name('store');
        Route::get('/', [ClassRoutineController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [ClassRoutineController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ClassRoutineController::class, 'update'])->name('update');
        Route::delete('/{id}', [ClassRoutineController::class, 'destroy'])->name('destroy');
        Route::get('/upload', [ClassRoutineController::class, 'upload'])->name('upload');
        Route::post('/upload', [ClassRoutineController::class, 'storeUpload'])->name('store_upload');
    });

    // Exam Routine
    Route::prefix('exam_routine')->name('exam_routine.')->group(function () {
        Route::get('/create', [ExamRoutineController::class, 'create'])->name('create');
        Route::post('/store', [ExamRoutineController::class, 'store'])->name('store');
        Route::get('/', [ExamRoutineController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [ExamRoutineController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ExamRoutineController::class, 'update'])->name('update');
        Route::delete('/{id}', [ExamRoutineController::class, 'destroy'])->name('destroy');
    });

    // Result
    Route::prefix('result')->name('result.')->group(function () {
        Route::get('/create', [ResultController::class, 'create'])->name('create');
        Route::post('/store', [ResultController::class, 'store'])->name('store');
        Route::get('/', [ResultController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [ResultController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ResultController::class, 'update'])->name('update');
        Route::delete('/{id}', [ResultController::class, 'destroy'])->name('destroy');
    });

    // Class
    Route::prefix('schoolclass')->name('schoolclass.')->group(function () {
        Route::get('/create', [SchoolClassController::class, 'create'])->name('create');
        Route::post('/store', [SchoolClassController::class, 'store'])->name('store');
        Route::get('/', [SchoolClassController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [SchoolClassController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SchoolClassController::class, 'update'])->name('update');
        Route::delete('/{id}', [SchoolClassController::class, 'destroy'])->name('destroy');
    });

    //Section
    Route::prefix('section')->name('section.')->group(function () {
        Route::get('/create', [SectionController::class, 'create'])->name('create');
        Route::post('/store', [SectionController::class, 'store'])->name('store');
        Route::get('/', [SectionController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [SectionController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SectionController::class, 'update'])->name('update');
        Route::delete('/{id}', [SectionController::class, 'destroy'])->name('destroy');
    });

    // Subject
    Route::prefix('subject')->name('subject.')->group(function () {
        Route::get('/create', [SubjectController::class, 'create'])->name('create');
        Route::post('/store', [SubjectController::class, 'store'])->name('store');
        Route::get('/', [SubjectController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [SubjectController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SubjectController::class, 'update'])->name('update');
        Route::delete('/{id}', [SubjectController::class, 'destroy'])->name('destroy');
    });

    // Contact
    Route::prefix('contact')->name('contact.')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('/create', [ContactController::class, 'create'])->name('create');
        Route::post('/store', [ContactController::class, 'store'])->name('store');
        Route::get('/{id}', [ContactController::class, 'show'])->name('show');
        // Route::get('/{id}/edit', [SchoolContactController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ContactController::class, 'update'])->name('update');
        Route::delete('/{id}', [ContactController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('result', ResultController::class);

        // // AJAX route
        // Route::get('admin/sections/{classId}', [SectionController::class, 'getByClass'])
        //  ->name('admin.sections.byClass');

    });

    Route::get('/get-sections/{classId}', [ResultController::class, 'getSections']);
    Route::get('/get-students/{classId}/{sectionId}', [ResultController::class, 'getStudents']);
    Route::get('/sections/{classId}', [SectionController::class, 'getByClass']);
    Route::get('/admin/sections/{classId}', [SectionController::class, 'getByClass']);

    Route::get('/class-routine/export', [ClassRoutineController::class, 'export'])
        ->name('class_routine.export');

    // new admission 

    Route::resource('admission', AdmissionController::class);

    // accounts
    Route::resource('accounts', AccountController::class);

    // account types
    Route::resource('account_types', AccountTypeController::class);

});
