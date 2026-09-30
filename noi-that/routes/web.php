<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/du-an', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/du-an/{slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store');

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login.submit');
    
    // Protected admin routes
    Route::middleware('auth')->group(function () {
        Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');
        
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
        
        // Placeholder route for projects
        Route::get('/projects', function() { return 'Projects'; })->name('admin.projects.index');
        
        // Inquiries routes
        Route::get('/inquiries', [\App\Http\Controllers\Admin\InquiryController::class, 'index'])->name('admin.inquiries.index');
        Route::put('/inquiries/{id}', [\App\Http\Controllers\Admin\InquiryController::class, 'updateStatus'])->name('admin.inquiries.update');
        Route::delete('/inquiries/{id}', [\App\Http\Controllers\Admin\InquiryController::class, 'destroy'])->name('admin.inquiries.destroy');
    });
});
