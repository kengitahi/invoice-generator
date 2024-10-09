<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

class Invoice extends Component
{
    #[Title('Create Invoice')]
    public function render()
    {
        return view('livewire.pages.invoice');
    }
}
