<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;

// Routes publiques
Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/ressource', function () {
    return view('ressource');
});

Route::get('/index', function() {
    return view('index');
});

Route::get('/signin', function() {
    return view('signin');
});

Route::get('/quiz', function() {
    return view('quiz');
});

Route::get('/AnonymousForm', function() {
    return view('AnonymousForm');
}); 

Route::get('/message', function() {
    return view('message');
}); 

// Routes d'authentification
Route::middleware(['web'])->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Routes des tableaux de bord (protégées)
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboardAdmin', [DashboardController::class, 'dashboardAdmin'])->name('dashboardAdmin');
        Route::get('/dashboardPsy', [DashboardController::class, 'dashboardPsy'])->name('dashboardPsy');
        Route::get('/dashboardUser', [DashboardController::class, 'dashboardUser'])->name('dashboardUser');
    });
}); 
