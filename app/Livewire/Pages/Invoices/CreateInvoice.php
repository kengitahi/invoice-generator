<?php

namespace App\Livewire\Pages\Invoices;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Traits\HasUploadedFile;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateInvoice extends Component
{
    use HasUploadedFile, WithFileUploads;

    public $items = [];

    public $logo;

    public $grand_total = 0;

    public $discountError = false;

    public $totalError = false;

    protected $listeners = ['addLineItem', 'calculateTotal'];

    //From the form
    public $invoice_number;

    public $invoice_date;

    public $invoice_terms;

    public $invoice_logo;

    public $sender_name;

    public $sender_business_name;

    public $sender_email;

    public $sender_logo;

    public $sender_tel;

    public $sender_website;

    public $sender_business_number;

    public $client_name;

    public $client_email;

    public $client_tel;

    public $client_business_number;

    public $invoice_notes;

    public $invoice_conditions;

    //Which submit button
    public $redirectTo = null;

    protected $rules = [
        'items.*.name' => 'required|string',
        'items.*.description' => 'nullable|string',
        'items.*.quantity' => 'required|numeric|min:1',
        'items.*.price' => 'required|numeric|min:0',
        'items.*.discount' => 'nullable|numeric|min:0|max:100',
        'items.*.shipping' => 'nullable|numeric|min:0',

        'invoice_number' => ['required', 'string', 'max:255', 'unique:'.Invoice::class],
        'invoice_date' => ['required', 'date'],
        'invoice_terms' => ['nullable', 'string', 'max:2000'],
        'invoice_conditions' => ['nullable', 'string', 'max:2000'],
        'invoice_notes' => ['nullable', 'string', 'max:2000'],
        'invoice_logo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],

        'sender_name' => ['required', 'string', 'max:255'],
        'sender_business_name' => ['string', 'max:255'],
        'sender_email' => ['required', 'lowercase', 'email:rfc,dns', 'max:255'],
        'sender_logo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        'sender_tel' => ['required', 'string', 'max:25'],
        'sender_website' => ['string', 'max:255'],
        'sender_business_number' => ['string', 'max:255'],

        'client_name' => ['required', 'string', 'max:255'],
        'client_email' => ['required', 'email: rfc,dns', 'max:255'],
        'client_tel' => ['required', 'string', 'max:25'],
        'client_business_number' => ['string', 'max:255'],

        'grand_total' => ['required'],
    ];

    public function mount(): void
    {
        // Initialize with one empty line item
        $this->addLineItem();
    }

    public function addLineItem()
    {
        $this->items[] = [
            'id' => uniqid(), // Unique identifier for each line item
            'name' => '',
            'description' => '',
            'quantity' => 1,
            'price' => 0,
            'discount' => 0,
            'shipping' => 0,
        ];
    }

    //TODO:Add calculations for single item subtotal and all items subtotal
    //TODO:Add functionality for setting invoice status, this will be an enum
    //TODO:Add functionality for deleting invoice
    //TODO:Add functionality for updating invoice
    //TODO:Add functionality for sending invoice, email
    //TODO:Add functionality for printing and previewing invoice
    //TODO:Add functionality for exporting invoice adn PDF
    //TODO:Add functionality for choosing currency

    public function calculateTotal($index)
    {
        if (! isset($this->items[$index])) {
            return;
        }

        $item = $this->items[$index];

        if ((float) $item['discount'] < 0 || (float) $item['discount'] > 100) {
            $this->discountError = true;
            $this->totalError = true;

            return;
        } else {
            $this->discountError = false;
            $this->totalError = false;
        }

        $subtotal = (int) $item['quantity'] * (int) $item['price'];
        $discountAmount = ($subtotal * (float) $item['discount']) / (float) 100;
        $this->items[$index]['total'] = (float) $subtotal - (float) $discountAmount + (float) $item['shipping'];

        // Calculate grand total
        $this->grand_total = collect($this->items)->sum('total');
    }

    public function removeLineItem($index): void
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items); // Re-index array
        $this->calculateTotal(0);
    }

    public function createInvoice()
    {
        $this->validate();
        $invoice = Auth::user()->invoices()->create([
            'invoice_number' => $this->invoice_number,
            'invoice_date' => $this->invoice_date,
            'invoice_terms' => $this->invoice_terms,
            'invoice_conditions' => $this->invoice_conditions,
            'invoice_notes' => $this->invoice_notes,

            'sender_name' => $this->sender_name,
            'sender_business_name' => $this->sender_business_name,
            'sender_email' => $this->sender_email,
            'sender_tel' => $this->sender_tel,
            'sender_website' => $this->sender_website,
            'sender_business_number' => $this->sender_business_number,

            'client_name' => $this->client_name,
            'client_email' => $this->client_email,
            'client_tel' => $this->client_tel,
            'client_business_number' => $this->client_business_number,

            'grand_total' => $this->grand_total,
        ]);

        foreach ($this->items as $item) {
            InvoiceItem::create([
                'invoice_id' => $invoice['id'],
                'item_name' => $item['name'],
                'item_description' => $item['description'],
                'item_quantity' => $item['quantity'],
                'item_price' => $item['price'],
                'item_discount' => $item['discount'],
                'item_shipping' => $item['shipping'],
            ]);
        }

        if ($this->invoice_logo) {
            /**
             * Store the uploaded avatar
             *
             * @param  \Illuminate\Http\UploadedFile  $file
             * @param  string  $directory
             * @param  string  $prefix
             * @param  ?string  $disk
             */
            $this->logo = $this->storeFile('logos', $this->invoice_logo, 'logo');

            DB::table('invoices')
                ->where('user_id', Auth::user()->id)
                ->where('invoice_number', $this->invoice_number)
                ->update(['invoice_logo' => $this->logo]);

            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['sender_logo' => $this->logo]);
        } else {
            DB::table('invoices')
                ->where('user_id', Auth::user()->id)
                ->latest()
                ->update(['invoice_logo' => Auth::user()->sender_logo]);
        }

        if ($this->redirectTo) {
            return redirect()->route('invoices.view', $invoice->invoice_number)->with('createdInvoiceAndRedirected', 'Invoice Created Successfully');
        }

        return redirect()->route('invoices.index')->with('createdInvoice', 'Invoice Created Successfully');
    }

    #[Title('Create Invoice')]
    public function render(): View
    {
        return view('livewire.pages.invoices.create');
    }
}
