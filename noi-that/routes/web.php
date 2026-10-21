<?php

use App\Http\Controllers\Admin\AuthController;
// Public Website Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
// Admin Panel Controllers
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController as FrontPostController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

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
| Static Pages
|--------------------------------------------------------------------------
*/
Route::get('/gioi-thieu', [PageController::class, 'about'])->name('page.about');
Route::get('/bao-gia', [PageController::class, 'pricing'])->name('page.pricing');
Route::get('/chinh-sach-bao-hanh', [PageController::class, 'warranty'])->name('page.warranty');
Route::get('/chinh-sach-bao-mat', [PageController::class, 'privacy'])->name('page.privacy');
Route::get('/dieu-khoan-su-dung', [PageController::class, 'terms'])->name('page.terms');
Route::get('/huong-dan-lien-he', [PageController::class, 'contactGuide'])->name('page.guide');

/*
|--------------------------------------------------------------------------
| Blog / Posts
|--------------------------------------------------------------------------
*/
Route::get('/bai-viet', [FrontPostController::class, 'index'])->name('posts.index');
Route::get('/bai-viet/{slug}', [FrontPostController::class, 'show'])->name('posts.show');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.submit');
    Route::get('/verify-2fa', [AuthController::class, 'showTwoFactorForm'])->name('2fa.form');
    Route::post('/verify-2fa', [AuthController::class, 'verifyTwoFactorCode'])->middleware('throttle:5,1')->name('2fa.verify');
    Route::post('/verify-2fa/resend', [AuthController::class, 'resendTwoFactorCode'])->middleware('throttle:3,1')->name('2fa.resend');
    Route::post('/verify-2fa/cancel', [AuthController::class, 'cancelTwoFactor'])->name('2fa.cancel');
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
        Route::resource('posts', PostController::class)->except(['show']);

        // Leads & Inquiries
        Route::prefix('inquiries')->name('inquiries.')->group(function () {
            Route::get('/', [InquiryController::class, 'index'])->name('index');
            Route::put('/{id}', [InquiryController::class, 'updateStatus'])->name('update');
            Route::delete('/{id}', [InquiryController::class, 'destroy'])->name('destroy');
        });

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
