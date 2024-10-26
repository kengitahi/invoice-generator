<?php

namespace App\Livewire\Pages\Invoices;

use Livewire\Attributes\Title;
use Livewire\Component;

class CreateInvoice extends Component
{
    public $items = [];

    public $grandTotal = 0;

    public $discountError = false;

    public $totalError = false;

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
        if (!isset($this->items[$index])) {
            return;
        }

        $item = $this->items[$index];

        if (0 > (float)$item['discount'] || (float)$item['discount'] > 100) {
            $this->discountError = true;
            $this->totalError = true;
        }else{
            $this->discountError = false;
            $this->totalError = false;
        }

        $subtotal = (integer) $item['quantity'] * (integer) $item['price'];
        $discountAmount = ($subtotal * (float) $item['discount']) / (float) 100;
        $this->items[$index]['total'] = (float) $subtotal - (float) $discountAmount + (float) $item['shipping'];

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
