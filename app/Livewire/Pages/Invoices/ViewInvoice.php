<?php

namespace App\Livewire\Pages\Invoices;

use App\Models\Invoice;
use Auth;
use Livewire\Component;

class ViewInvoice extends Component
{
    public $invoice;

    public function mount($invoice_number)
    {
        $this->invoice = Invoice::where('invoice_number', $invoice_number)->first();
    }

    public function render()
    {
        if (Auth::user()->id !== $this->invoice->user_id) {
            abort(403);
        }

        return view('livewire.pages.invoices.view', ['invoice' => $this->invoice]);
    }
}
