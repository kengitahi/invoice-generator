<?php

namespace App\Livewire\Pages\Invoices;

use App\Models\Invoice;
use Auth;
use Livewire\Component;

class EditInvoice extends Component
{
    public $invoice;

    public $grand_total = 0;

    public $discountError = false;

    public $totalError = false;

    public function mount($invoice_number)
    {
        $this->invoice = Invoice::where('invoice_number', $invoice_number)->first();
    }

    public function render()
    {
        if (Auth::user()->id !== $this->invoice->user_id) {
            abort(403);
        }

        return view('livewire.pages.invoices.edit', ['invoice' => $this->invoice])->title('Editing Invoice No: '.$this->invoice->invoice_number);
    }
}
