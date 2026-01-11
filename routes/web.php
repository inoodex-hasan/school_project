<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Notice;
use App\Models\Slide;
use App\Models\About;
use App\Models\Gallery;

use App\Http\Controllers\NoticeController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\WebsiteController;

// Login Page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Handle Login
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->intended('/admin/dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ]);
})->name('login.post');

// Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// Frontend
Route::get('/', [WebsiteController::class, 'home'])->name('home');

// Notices
Route::get('/notices', [WebsiteController::class, 'allNotices'])->name('notices.index');
Route::get('/notices/{id}', [WebsiteController::class, 'showNotice'])->name('notices.show');

// About
Route::get('/about/history', [WebsiteController::class, 'history'])->name('about.history');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');

Route::get('frontend/about_history', [WebsiteController::class, 'aboutHistory']);

// Teachers
Route::get('/teachers', [WebsiteController::class, 'teachers'])->name('teachers');

// Message
Route::get('/message/{id}', [WebsiteController::class, 'showMessage'])->name('message.show');

// Gallery
Route::get('/gallery', [WebsiteController::class, 'galleryPage'])->name('gallery.page');

// Events
Route::get('/events', [WebsiteController::class, 'allEvents'])->name('events.index');
Route::get('/events/{id}', [WebsiteController::class, 'showEvent'])->name('events.show');

// Class Routine
Route::get('/class-routine', [WebsiteController::class, 'classRoutine'])->name('class.routine');
Route::get('/class-routine/{id}', [WebsiteController::class, 'show'])->name('frontend.class_routine');

// Contact
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');


Route::get('/admin/adminlayout', function () {
    return view('admin.adminlayout');
})->name('adminlayout');