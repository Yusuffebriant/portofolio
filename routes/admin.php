<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\MessageController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    // Guest only
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    });

    // Authenticated only
    Route::middleware('auth')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('projects', ProjectController::class)->except(['show']);
        Route::post('projects/{project}/toggle-publish', [ProjectController::class, 'togglePublish'])->name('projects.toggle');

        Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
        Route::post('messages/{message}/read', [MessageController::class, 'markRead'])->name('messages.read');
        Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    });
});
