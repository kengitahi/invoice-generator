<?php

use App\Http\Controllers\InvoiceController;
use App\Livewire\Home;
use App\Livewire\Pages\Contact;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);
Route::get('/contact-us', Contact::class)->name('contact');


Route::resource('invoices', InvoiceController::class);

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
