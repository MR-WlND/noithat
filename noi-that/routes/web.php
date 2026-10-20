<?php

use Illuminate\Support\Facades\Route;

// Public Website Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;

// Admin Panel Controllers
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/du-an', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/du-an/{slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::post('/lien-he', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |----------------------------------------------------------------------
    | Protected Admin Routes (Requires Authentication)
    |----------------------------------------------------------------------
    */
    Route::middleware('auth')->group(function () {
        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Projects
        Route::resource('projects', AdminProjectController::class)->except(['show']);

        // Posts & SEO
        Route::prefix('posts')->name('posts.')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('index');
            Route::post('/', [PostController::class, 'store'])->name('store');
            Route::delete('/{id}', [PostController::class, 'destroy'])->name('destroy');
        });

        // Leads & Inquiries
        Route::prefix('inquiries')->name('inquiries.')->group(function () {
            Route::get('/', [InquiryController::class, 'index'])->name('index');
            Route::put('/{id}', [InquiryController::class, 'updateStatus'])->name('update');
            Route::delete('/{id}', [InquiryController::class, 'destroy'])->name('destroy');
        });

        // Workshop & Materials
        Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');

        // Website Settings
        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('index');
            Route::post('/', [SettingController::class, 'update'])->name('update');
        });

        // User & Role Management
        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::post('/', [UserController::class, 'store'])->name('store');
            Route::put('/{id}/role', [UserController::class, 'updateRole'])->name('updateRole');
        });

        // Profile & Security Settings
        Route::prefix('profile')->name('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index']);
            Route::post('/', [ProfileController::class, 'update'])->name('.update');
            Route::post('/password', [ProfileController::class, 'updatePassword'])->name('.password');
            Route::post('/2fa', [ProfileController::class, 'toggle2FA'])->name('.2fa');
        });
    });
});
