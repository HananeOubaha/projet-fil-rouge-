<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\CheckRole;

// Routes protégées pour l'administration
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Appliquer le middleware CheckRole directement
    Route::middleware([CheckRole::class . ':admin'])->group(function () {
        // Gestion des psychologues
        Route::get('/psychologists', [AdminController::class, 'psychologists'])->name('psychologists');
        Route::post('/psychologists/{user}/approve', [AdminController::class, 'approvePsychologist'])->name('psychologists.approve');
        Route::post('/psychologists/{user}/reject', [AdminController::class, 'rejectPsychologist'])->name('psychologists.reject');
        
        // Gestion des catégories
        Route::get('/categories', [AdminController::class, 'categories'])->name('categories');
        Route::get('/categories/create', [AdminController::class, 'createCategory'])->name('categories.create');
        Route::post('/categories', [AdminController::class, 'storeCategory'])->name('categories.store');
        Route::get('/categories/{category}/edit', [AdminController::class, 'editCategory'])->name('categories.edit');
        Route::put('/categories/{category}', [AdminController::class, 'updateCategory'])->name('categories.update');
        Route::delete('/categories/{category}', [AdminController::class, 'deleteCategory'])->name('categories.delete');
        
        // Gestion des ressources
        Route::get('/resources', [AdminController::class, 'resources'])->name('resources');
        Route::post('/resources/{resource}/toggle-status', [AdminController::class, 'toggleResourceStatus'])->name('resources.toggle-status');
    });
});