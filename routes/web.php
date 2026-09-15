<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// ---------- Public pages ----------
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{slug}', [PageController::class, 'serviceDetail'])->name('services.show');
Route::get('/portfolio', [PageController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{slug}', [PageController::class, 'projectDetail'])->name('portfolio.show');
Route::get('/learn', [PageController::class, 'learn'])->name('learn');
Route::get('/learn/{slug}', [PageController::class, 'learnDetail'])->name('learn.show');
Route::get('/community', [PageController::class, 'community'])->name('community');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::post('/newsletter', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/search', [PageController::class, 'search'])->name('search');

// ---------- Public CV ----------
Route::get('/cv/{username}', [CvController::class, 'show'])->name('cv.show');
Route::get('/cv/{username}/download', [CvController::class, 'download'])->name('cv.download');

// ---------- Auth ----------
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:10,1')->name('login.attempt');
    Route::get('/join', [AuthController::class, 'showRegister'])->name('join');
    Route::post('/join', [AuthController::class, 'register'])->name('join.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// ---------- Member dashboard ----------
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'editProfile'])->name('dashboard.profile');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('dashboard.profile.update');
    Route::get('/cv', [DashboardController::class, 'editCv'])->name('dashboard.cv');
    Route::post('/cv/experience', [DashboardController::class, 'storeExperience'])->name('dashboard.cv.experience');
    Route::post('/cv/education', [DashboardController::class, 'storeEducation'])->name('dashboard.cv.education');
    Route::post('/cv/certification', [DashboardController::class, 'storeCertification'])->name('dashboard.cv.certification');
    Route::delete('/cv/experience/{experience}', [DashboardController::class, 'destroyExperience'])->name('dashboard.cv.experience.delete');
    Route::delete('/cv/education/{education}', [DashboardController::class, 'destroyEducation'])->name('dashboard.cv.education.delete');
    Route::delete('/cv/certification/{certification}', [DashboardController::class, 'destroyCertification'])->name('dashboard.cv.certification.delete');
    Route::get('/cv/download', [CvController::class, 'own'])->name('dashboard.cv.download');
});

// ---------- Admin panel ----------
Route::middleware(['auth', App\Http\Middleware\EnsureAdmin::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

        Route::get('/{resource}', [AdminController::class, 'index'])->name('resource.index');
        Route::get('/{resource}/create', [AdminController::class, 'create'])->name('resource.create');
        Route::post('/{resource}', [AdminController::class, 'store'])->name('resource.store');
        Route::get('/{resource}/{id}/edit', [AdminController::class, 'edit'])->name('resource.edit');
        Route::put('/{resource}/{id}', [AdminController::class, 'update'])->name('resource.update');
        Route::delete('/{resource}/{id}', [AdminController::class, 'destroy'])->name('resource.destroy');
    });

require __DIR__.'/auth-redirects.php';
