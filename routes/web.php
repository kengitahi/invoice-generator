<?php

use App\Livewire\Home;
use App\Livewire\Pages\Invoice;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/home', Home::class);
Route::get('/create-invoice', Invoice::class)->name('create-invoice');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
