<?php

namespace App\Providers;

use App\Models\Invoice;
use App\Models\User;
use Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('edit-invoice', function (User $user, Invoice $invoice) {
            return $user->id === $invoice->user_id;
        });

        // Ensure invoices directory exists
        if (! Storage::disk('invoices')->exists('')) {
            Storage::disk('invoices')->makeDirectory('');
        }
    }
}
