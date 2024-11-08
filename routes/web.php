<?php

use App\Livewire\Home;
use App\Livewire\Pages\Contact;
use App\Livewire\Pages\Invoices\CreateInvoice;
use App\Livewire\Pages\Invoices\EditInvoice;
use App\Livewire\Pages\Invoices\IndexInvoices;
use App\Livewire\Pages\Invoices\ViewInvoice;
use App\Livewire\Pages\Payments\CreatePayment;
use App\Livewire\Pages\Payments\IndexPayments;
use App\Models\Invoice;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    //Invoice routes
    Route::prefix('invoices')->group(function () {
        Route::name('invoices.')->group(function () {
            Route::get('/', IndexInvoices::class)->name('index');
            Route::view('/search-results', 'livewire.pages.invoices.results')->name('results');
            Route::get('/create', CreateInvoice::class)->name('create');
            Route::get('/{invoice_number}/edit', EditInvoice::class)->name('edit');
            Route::get('/{invoice_number}/view', ViewInvoice::class)->name('view');
        });
    });

    //Payment Routes
    Route::prefix('payments')->group(function () {
        Route::name('payments.')->group(function () {
            Route::get('/', IndexPayments::class)->name('index');
            Route::get('/create', CreatePayment::class)->name('create');
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
