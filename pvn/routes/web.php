<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PsychologistAppointmentController;
use App\Http\Controllers\ResourceController;
use App\Http\Middleware\CheckRole;

// Routes publiques
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/ressource', [ResourceController::class , 'index1']
)->name('ressource');


Route::get('/resources/index' , [ResourceController::class , 'index']);
Route::get('/ressource/create' , function(){
    return view('psychologist.resources.create');
});
Route::post('/ressource/create' , [ResourceController::class , 'store'])->name('psychologist.resources.index');


Route::get('/ressource/{resource}', [ResourceController::class, 'show'])->name('ressource.show');

Route::resource('resources', ResourceController::class)->names([
    'index' => 'psychologist.resources.index',
    'create' => 'psychologist.resources.create',
    'store' => 'psychologist.resources.store',
    'edit' => 'psychologist.resources.edit',
    'update' => 'psychologist.resources.update',
    'destroy' => 'psychologist.resources.destroy'
]);

Route::get('/resources/{resource}/download', [ResourceController::class, 'download'])
     ->name('resources.download');

Route::get('/login', function() {
    return view('signin');
});

Route::get('/quiz', function() {
    return view('quiz');
})->name('quiz');

Route::get('/AnonymousForm', function() {
    return view('AnonymousForm');
}); 

Route::get('/message', function() {
    return view('message');
})->name('message');
// route pour booking
Route::get('/booking' ,function(){
    return view('booking.psychologists');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');

// // Routes d'authentification
// Route::middleware(['web'])->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Routes des tableaux de bord (protégées)
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboardAdmin', [DashboardController::class, 'dashboardAdmin'])->name('dashboardAdmin');
        Route::get('/dashboardPsy', [DashboardController::class, 'dashboardPsy'])->name('dashboardPsy');
        Route::get('/dashboardUser', [DashboardController::class, 'dashboardUser'])->name('dashboardUser');

        // Routes pour les rendez-vous
        Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
        Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
        Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
        Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
        Route::patch('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
    });

    // Routes pour les rendez-vous des psychologues
    // Route::middleware(['auth', CheckRole::class.':psychologist'])->group(function () {
        Route::get('/psychologist/appointments', [PsychologistAppointmentController::class, 'index'])->name('psychologist.appointments.index');
        Route::get('/psychologist/appointments/{appointment}', [PsychologistAppointmentController::class, 'show'])->name('psychologist.appointments.show');
        Route::put('/psychologist/appointments/{appointment}/status', [PsychologistAppointmentController::class, 'updateStatus'])->name('psychologist.appointments.updateStatus');
    // });

    // Routes pour les ressources des psychologues
    // Route::middleware(['auth', CheckRole::class.':psychologist'])->group(function () {
    //     Route::resource('psychologist/resources', ResourceController::class)->names([
    //         'index' => 'psychologist.resources.index',
    //         'create' => 'psychologist.resources.create',
    //         'store' => 'psychologist.resources.store',
    //         'edit' => 'psychologist.resources.edit',
    //         'update' => 'psychologist.resources.update',
    //         'destroy' => 'psychologist.resources.destroy',
    //     ]);
    // });