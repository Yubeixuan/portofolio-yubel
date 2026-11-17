<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

// Halaman utama (Bahasa Indonesia) dan versi Inggris
Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/en', [PortfolioController::class, 'index'])->defaults('lang', 'en')->name('home.en');
