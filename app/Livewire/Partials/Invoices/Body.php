<?php

namespace App\Livewire\Partials\Invoices;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Body extends Component
{
    #[Layout('layouts.blank')]
    public function render()
    {
        return view('livewire.partials.invoices.body');
    }
}
