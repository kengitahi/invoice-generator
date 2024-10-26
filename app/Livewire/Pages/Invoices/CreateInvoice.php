<?php

namespace App\Livewire\Pages\Invoices;

use Livewire\Attributes\Title;
use Livewire\Component;

class CreateInvoice extends Component
{
    public $items = [];

    public $grandTotal = 0;

    protected $listeners = ['addLineItem', 'calculateTotal'];

    public function mount()
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

    public function calculateTotal($index)
    {
        if (! isset($this->items[$index])) {
            return;
        }

        $item = $this->items[$index];
        $subtotal = $item['quantity'] * $item['price'];
        $discountAmount = ($subtotal * $item['discount']) / 100;
        $this->items[$index]['total'] = $subtotal - $discountAmount + $item['shipping'];

        // Calculate grand total
        $this->grandTotal = collect($this->items)->sum('total');
    }

    public function removeLineItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items); // Re-index array
        $this->calculateTotal(0);
    }

    #[Title('Create Invoice')]
    public function render()
    {
        return view('livewire.pages.invoices.create');
    }
}
