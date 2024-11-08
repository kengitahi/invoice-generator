<?php

namespace App\Livewire\Pages\Invoices;

use App\Models\Invoice;
use Auth;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class IndexInvoices extends Component
{
    public $InvoiceNumber;

    public $ClientDetail;

    private $invoices;

    protected $InvoiceNumberRules = [
        'InvoiceNumber' => ['required', 'alpha_num', 'min:1'],
    ];

    protected $ClientDetailRules = [
        'ClientDetail' => ['required', 'alpha_num', 'min:1'],
    ];

    #[Layout('layouts.app')]
    #[Title('Your Invoices')]
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
        );
    }
}
