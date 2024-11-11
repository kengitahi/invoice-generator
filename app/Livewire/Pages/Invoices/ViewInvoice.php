<?php

namespace App\Livewire\Pages\Invoices;

use App\Models\Invoice;
use Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.blank')]
class ViewInvoice extends Component
{
    public $invoice;

    public $title;

    public function mount(int $invoice_number): void
    {
        $this->invoice = Invoice::where('invoice_number', $invoice_number)->first();
    }

    public function render(): View
    {
        if (Auth::id() !== $this->invoice->user_id) {
            abort(403);
        }

        return view('livewire.pages.invoices.view', ['invoice' => $this->invoice])->title('Previewing Invoice No: '.$this->invoice->invoice_number);
    }
}
