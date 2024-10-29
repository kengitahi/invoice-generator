<?php

namespace App\Livewire\Partials\Invoices;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Body extends Component
{
    public $invoice;

    #[Layout('layouts.blank')]
    public function render()
    {
        return view('livewire.partials.invoices.body');
    }
}
