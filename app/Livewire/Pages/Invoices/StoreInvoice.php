<?php

namespace App\Livewire\Pages\Invoices;

use Livewire\Component;

class StoreInvoice extends Component
{
    public function store()
    {
        dd('I will store invoice data');
    }

    public function render()
    {
        return view('livewire.pages.invoices.store');
    }
}
