<?php

namespace App\Livewire\Pages\Invoices;

use App\Models\Invoice;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SearchResults extends Component
{
    public $SearchTerm = '';

    public function mount($search_term): void
    {
        $this->SearchTerm = $search_term;
    }

    protected $rules = [
        'SearchTerm' => 'required|string|min:1',
    ];

    public function findInvoices(): RedirectResponse
    {
        $this->validate($this->rules);

        return redirect()->route('invoices.search-results', $this->SearchTerm);
    }

    #[Layout('layouts.app')]
    #[Title('Search Results')]
    public function render(): View
    {
        return view(
            'livewire.pages.invoices.search-results',
            [
                'invoices' => Invoice::where('user_id', Auth::user()->id)
                    ->where('invoice_number', 'like', '%'.$this->SearchTerm.'%')
                    ->orWhere('client_name', 'like', '%'.$this->SearchTerm.'%')
                    ->orWhere('client_email', 'like', '%'.$this->SearchTerm.'%')
                    ->paginate(10),
            ]
        );
    }
}
