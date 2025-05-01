<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PsychologistAppointmentController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ResourceInteractionController;
use App\Http\Middleware\CheckRole;

//  Routes publiques
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

//  Routes publiques des ressources
Route::get('/ressource', [ResourceController::class, 'index1'])->name('ressource');
Route::get('/resources/filter', [ResourceController::class, 'filter'])->name('resources.filter');
Route::get('/resources/{resource}/download', [ResourceController::class, 'download'])->name('resources.download');

//  Routes protégées (authentification requise)
Route::middleware(['auth'])->group(function () {

    //  Routes des ressources des psychologues (CRUD)
    Route::resource('resources', ResourceController::class)->names([
        'index' => 'psychologist.resources.index',
        'create' => 'psychologist.resources.create',
        'store' => 'psychologist.resources.store',
        'edit' => 'psychologist.resources.edit',
        'update' => 'psychologist.resources.update',
        'destroy' => 'psychologist.resources.destroy'
    ]);
    Route::get('/ressource/create', [ResourceController::class, 'create'])->name('psychologist.resources.create');
    Route::post('/ressource/store', [ResourceController::class, 'store'])->name('psychologist.resources.store');
    Route::get('/ressource/index', [ResourceController::class, 'index'])->name('psychologist.resources.index');
    // Route::get('/ressource/edit', [ResourceController::class, 'create'])->name('psychologist.resources.edit');

    Route::post('/resources/{resource}/like', [ResourceInteractionController::class, 'toggleLike'])
    ->name('resources.like')
    ->middleware('auth');

    Route::post('/resources/{resource}/comment', [ResourceInteractionController::class, 'storeComment'])
    ->name('resources.comment')
    ->middleware('auth');


    // Dashboards selon le rôle
    Route::get('/dashboardAdmin', [DashboardController::class, 'dashboardAdmin'])->name('dashboardAdmin');
    Route::get('/dashboardPsy', [DashboardController::class, 'dashboardPsy'])->name('dashboardPsy');
    Route::get('/dashboardUser', [DashboardController::class, 'dashboardUser'])->name('dashboardUser');
    

    // Rendez-vous
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::patch('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');

    //  Gestion des rendez-vous par les psychologues
    Route::get('/psychologist/appointments', [PsychologistAppointmentController::class, 'index'])->name('psychologist.appointments.index');
    Route::get('/psychologist/appointments/{appointment}', [PsychologistAppointmentController::class, 'show'])->name('psychologist.appointments.show');
    Route::put('/psychologist/appointments/{appointment}/status', [PsychologistAppointmentController::class, 'updateStatus'])->name('psychologist.appointments.updateStatus');
});

//  Routes d’authentification
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//  Autres vues publiques
Route::get('/quiz', function () {
    return view('quiz');
})->name('quiz');

Route::get('/AnonymousForm', function () {
    return view('AnonymousForm');
});

Route::get('/message', function () {
    return view('message');
})->name('message');

Route::get('/booking', function () {
    return view('booking.psychologists');
});

//  route dynamique pour l’affichage d’une ressource (doit venir en dernier)
Route::get('/ressource/{resource}', [ResourceController::class, 'show'])
    ->whereNumber('resource')
    ->name('ressource.show');
    // Inclure les routes d'administration
require __DIR__.'/admin.php';