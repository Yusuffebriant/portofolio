<?php

use App\Http\Controllers\Public\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route contact form (Tahap 5 akan mengisi logic penyimpanan pesan)
Route::post('/contact', [HomeController::class, 'sendMessage'])->name('contact.send');
