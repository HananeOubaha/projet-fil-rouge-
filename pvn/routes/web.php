<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PsychologistAppointmentController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ResourceInteractionController;
use App\Http\Controllers\AnonymousForumController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\QuizController;
use App\Http\Middleware\CheckRole;

// -------------------
// Routes publiques
// -------------------

Route::view('/', 'index')->name('index');
Route::view('/about', 'about')->name('about');
Route::view('/message', 'message')->name('message');
Route::view('/booking', 'booking.psychologists');

// Authentification
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ressources publiques
Route::get('/ressource', [ResourceController::class, 'index1'])->name('ressource');
Route::get('/resources/filter', [ResourceController::class, 'filter'])->name('resources.filter');
Route::get('/resources/{resource}/download', [ResourceController::class, 'download'])->name('resources.download');

// Quiz (public accès à la page)
Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');

// -------------------
// Routes protégées (auth)
// -------------------

Route::middleware(['auth'])->group(function () {

    // Ressources pour les psychologues
    Route::prefix('ressource')->name('psychologist.resources.')->group(function () {
        Route::get('/create', [ResourceController::class, 'create'])->name('create');
        Route::post('/store', [ResourceController::class, 'store'])->name('store');
        Route::get('/index', [ResourceController::class, 'index'])->name('index');
    });

    // CRUD standard ressources avec noms personnalisés
    Route::resource('resources', ResourceController::class)->names([
        'index' => 'psychologist.resources.index',
        'create' => 'psychologist.resources.create',
        'store' => 'psychologist.resources.store',
        'edit' => 'psychologist.resources.edit',
        'update' => 'psychologist.resources.update',
        'destroy' => 'psychologist.resources.destroy'
    ]);

    // Interactions sur les ressources
    Route::post('/resources/{resource}/like', [ResourceInteractionController::class, 'toggleLike'])->name('resources.like');
    Route::post('/resources/{resource}/comment', [ResourceInteractionController::class, 'storeComment'])->name('resources.comment');
 Route::delete('/comments/{comment}', [ResourceInteractionController::class, 'deleteComment'])->name('comments.delete');
    // Dashboards par rôle
    Route::get('/dashboardAdmin', [DashboardController::class, 'dashboardAdmin'])->name('dashboardAdmin');
    Route::get('/dashboardPsy', [DashboardController::class, 'dashboardPsy'])->name('dashboardPsy');
    Route::get('/dashboardUser', [DashboardController::class, 'dashboardUser'])->name('dashboardUser');

    // Forum anonyme
    Route::get('/forum-anonyme', [AnonymousForumController::class, 'index'])->name('anonymous.forum');
    Route::post('/forum-anonyme', [AnonymousForumController::class, 'store'])->name('anonymous.forum.store');
    Route::post('/forum-anonyme/{post}/comment', [AnonymousForumController::class, 'storeComment'])->name('anonymous.forum.comment');
    Route::post('/forum-anonyme/{post}/support', [AnonymousForumController::class, 'support'])->name('anonymous.forum.support');

    // Signalements
    Route::post('/report', [ReportController::class, 'store'])->name('report.store');

    // Admin - gestion des signalements
    Route::middleware([CheckRole::class . ':admin'])->group(function () {
        Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports.index');
        Route::get('/admin/reports/{report}', [ReportController::class, 'show'])->name('admin.reports.show');
        Route::put('/admin/reports/{report}', [ReportController::class, 'update'])->name('admin.reports.update');
    });

    // Rendez-vous
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
    Route::patch('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');

    // Rendez-vous côté psychologue
    Route::get('/psychologist/appointments', [PsychologistAppointmentController::class, 'index'])->name('psychologist.appointments.index');
    Route::get('/psychologist/appointments/{appointment}', [PsychologistAppointmentController::class, 'show'])->name('psychologist.appointments.show');
    Route::put('/psychologist/appointments/{appointment}/status', [PsychologistAppointmentController::class, 'updateStatus'])->name('psychologist.appointments.updateStatus');

    // Quiz (store + résultats)
    Route::post('/quiz', [QuizController::class, 'store'])->name('quiz.store');
    Route::get('/quiz/results/{id}', [QuizController::class, 'show'])->name('quiz.results');

    // Vue détaillée d'une ressource
    Route::get('/ressource/{resource}', [ResourceController::class, 'show'])->whereNumber('resource')->name('ressource.show');
});

// Inclure routes d'admin séparées
require __DIR__ . '/admin.php';
