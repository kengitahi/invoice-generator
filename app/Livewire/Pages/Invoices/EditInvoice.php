<?php

namespace App\Livewire\Pages\Invoices;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Traits\HasUploadedFile;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditInvoice extends Component
{
    use HasUploadedFile, WithFileUploads;

    public $invoice;

    public $items = [];

    public $logo;

    public $quantity = 1;

    public $price = 0.00;

    public $discount = 0.00;

    public $shipping = 0.00;

    public $grand_total = 0;

    public $discountError = false;

    public $totalError = false;

    protected $listeners = ['calculateTotal'];

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

    public $new_logo;

    protected function rules(): array
    {
        return [
            'items.*.name' => 'required|string',
            'items.*.description' => 'nullable|string',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.discount' => 'nullable|numeric|min:0|max:100',
            'items.*.shipping' => 'nullable|numeric|min:0',

            'invoice_date' => ['required', 'date'],
            'invoice_terms' => ['nullable', 'string', 'max:2000'],
            'invoice_conditions' => ['nullable', 'string', 'max:2000'],
            'invoice_notes' => ['nullable', 'string', 'max:2000'],

            'sender_name' => ['required', 'string', 'max:255'],
            'sender_business_name' => ['string', 'max:255'],
            'sender_email' => [
                'required',
                'lowercase',
                'email:rfc,dns',
                'max:255',
            ],
            'sender_tel' => ['required', 'string', 'max:25'],
            'sender_website' => ['string', 'max:255'],
            'sender_business_number' => ['string', 'max:255'],

            'client_name' => ['required', 'string', 'max:255'],
            'client_email' => ['required', 'email: rfc,dns', 'max:255'],
            'client_tel' => ['required', 'string', 'max:25'],
            'client_business_number' => ['string', 'max:255'],

            'grand_total' => ['required'],
        ];
    }

    public function mount(int $invoice_number): void
    {
        // Get the invoice to edit
        $this->invoice = Invoice::where(
            'invoice_number',
            $invoice_number
        )->first();

        // Set the invoice
        $invoice = $this->invoice;

        // Invoice details
        $this->invoice_date = $invoice->invoice_date->format('Y-m-d');
        $this->invoice_terms = $invoice->invoice_terms;
        $this->invoice_conditions = $invoice->invoice_conditions;
        $this->invoice_notes = $invoice->invoice_notes;
        $this->invoice_logo = $invoice->invoice_logo;

        $this->sender_name = $invoice->sender_name;
        $this->sender_business_name = $invoice->sender_business_name;
        $this->sender_email = $invoice->sender_email;
        $this->sender_logo = $invoice->sender_logo;
        $this->sender_tel = $invoice->sender_tel;
        $this->sender_website = $invoice->sender_website;
        $this->sender_business_number = $invoice->sender_business_number;

        $this->client_name = $invoice->client_name;
        $this->client_email = $invoice->client_email;
        $this->client_tel = $invoice->client_tel;
        $this->client_business_number = $invoice->client_business_number;

        $this->grand_total = $invoice->grand_total;

        // Line items
        $this->items = $invoice->items
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->item_name,
                    'description' => $item->item_description,
                    'quantity' => $item->item_quantity,
                    'price' => $item->item_price,
                    'discount' => $item->item_discount,
                    'shipping' => $item->item_shipping,
                ];
            })
            ->toArray();

        //Calculate each item's total on mount
        foreach ($this->items as $index => $item) {
            $this->calculateTotal($index);
        }
    }

    public function addLineItem(): void
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

    public function calculateTotal(int $index): void
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
        $this->items[$index]['total'] =
            (float) $subtotal -
            (float) $discountAmount +
            (float) $item['shipping'];

        // Calculate grand total
        $this->grand_total = collect($this->items)->sum('total');
    }

    public function removeLineItem(int $index): void
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items); // Re-index array
        $this->calculateTotal(0);
    }

    public function update(Request $request)
    {
        $this->validate();

        //Update main invoice details
        $this->invoice->update([
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

        // Update or create items
        foreach ($this->items as $item) {
            if (isset($item['id']) && is_numeric($item['id'])) {
                // Update existing item
                InvoiceItem::where('id', $item['id'])->update([
                    'item_name' => $item['name'],
                    'item_description' => $item['description'],
                    'item_quantity' => $item['quantity'],
                    'item_price' => $item['price'],
                    'item_discount' => $item['discount'],
                    'item_shipping' => $item['shipping'],
                ]);
            } else {
                // Create new item
                InvoiceItem::create([
                    'invoice_id' => $this->invoice->id,
                    'item_name' => $item['name'],
                    'item_description' => $item['description'],
                    'item_quantity' => $item['quantity'],
                    'item_price' => $item['price'],
                    'item_discount' => $item['discount'],
                    'item_shipping' => $item['shipping'],
                ]);
            }
        }

        // Remove items that were deleted from the form
        $itemIds = collect($this->items)
            ->pluck('id')
            ->filter()
            ->toArray();

        InvoiceItem::where('invoice_id', $this->invoice->id)
            ->whereNotIn('id', $itemIds)
            ->delete();

        //Update logo
        if ($this->new_logo) {
            /**
             * Update logo
             *
             * @param  \Illuminate\Http\UploadedFile  $file
             * @param  string  $directory
             * @param  string  $prefix
             * @param  ?string  $disk
             */
            $this->logo = $this->updateFile($this->new_logo, $this->invoice_logo, 'logos', 'logo');

            DB::table('invoices')
                ->where('user_id', Auth::user()->id)
                ->where('invoice_number', $this->invoice_number)
                ->update(['invoice_logo' => $this->logo]);
        }

        return redirect()
            ->route('invoices.index')
            ->with('updatedInvoice', 'Invoice updated Successfully');
    }

    public function render(): View
    {
        if (Auth::user()->id !== $this->invoice->user_id) {
            abort(403);
        }

        return view('livewire.pages.invoices.edit', [
            'invoice' => $this->invoice,
        ])->title('Editing Invoice No: '.$this->invoice->invoice_number);
    }
}
