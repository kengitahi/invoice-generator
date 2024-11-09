<?php

namespace App\Livewire\Pages\Invoices;

use App\Models\Invoice;
use Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class IndexInvoices extends Component
{
    public $InvoiceNumber;

    public $ClientDetail;

    public $SearchTerm;

    private $invoices;

    public function findInvoices()
    {
        return redirect()->route('invoices.search-results', $this->SearchTerm);
    }

    #[Layout('layouts.app')]
    public function render(): View
    {
        if (! isset($this->invoices)) {
            $this->invoices = Invoice::where('user_id', Auth::user()->id)->paginate(10);
        }

        return view(
            'livewire.pages.invoices.index',
            [
                'invoices' => $this->invoices,
            ]
        )->title('Your Invoices');
    }
}
