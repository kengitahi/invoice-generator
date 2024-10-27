<?php

namespace App\Livewire\Pages\Invoices;

use Livewire\Attributes\Title;
use Livewire\Component;

class IndexInvoices extends Component
{
    public $invoices;

    public function mount()
    {
        $this->invoices = auth()->user()->invoices;
    }

    #[Title('All Invoices')]
    public function render()
    {
        return view('livewire.pages.invoices.index', ['invoices' => $this->invoices]);
    }
}
