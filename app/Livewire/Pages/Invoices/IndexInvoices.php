<?php

namespace App\Livewire\Pages\Invoices;

use Livewire\Attributes\Title;
use Livewire\Component;

class IndexInvoices extends Component
{
    #[Title('All Invoices')]
    public function render()
    {
        return view('livewire.pages.invoices.index');
    }
}
