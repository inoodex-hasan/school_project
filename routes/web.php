<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\WebsiteController;

// Login Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard'));
    }

    return back()->withErrors([
        'email' => 'Invalid credentials.',
    ]);
})->name('login.post');

// Logout Route
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// GET logout for convenience
Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout.get');

// Frontend Routes - show index page
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('admin.dashboard');
    }
    return view('index');
});

Route::get('demo2', function () {
    return view('frontend.demo2');
})->name('demo2');

Route::get('demo3', function () {
    return view('frontend.demo3');
})->name('demo3');

Route::get('demo4', function () {
    return view('frontend.demo4');
})->name('demo4');
// Frontend Public Routes
// Route::get('/notices', [WebsiteController::class, 'allNotices'])->name('notices.index');
// Route::get('/notices/{id}', [WebsiteController::class, 'showNotice'])->name('notices.show');

// Route::get('/about/history', [WebsiteController::class, 'history'])->name('about.history');
// Route::get('/about', [WebsiteController::class, 'about'])->name('about');

// Route::get('/teachers', [WebsiteController::class, 'teachers'])->name('teachers');

// Route::get('/message/{id}', [WebsiteController::class, 'showMessage'])->name('message.show');

// Route::get('/gallery', [WebsiteController::class, 'galleryPage'])->name('gallery.page');

// Route::get('/events', [WebsiteController::class, 'allEvents'])->name('events.index');
// Route::get('/events/{id}', [WebsiteController::class, 'showEvent'])->name('events.show');

// Route::get('/class-routine', [WebsiteController::class, 'classRoutine'])->name('class.routine');
// Route::get('/class-routine/{id}', [WebsiteController::class, 'show'])->name('frontend.class_routine');

// Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');

// Include Admin Routes
require base_path('routes/admin.php');
