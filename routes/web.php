<?php

use App\Livewire\Home;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\CreateInvoice;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('invoices')->group(function () {
        Route::name('invoices.')->group(function () {
            Route::get('/create', CreateInvoice::class)->name('create');
        });
    });
});

Route::get('/contact-us', Contact::class)->name('contact');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
