<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        "invoice_id", //Each invoiceItem belongs to invoice
        "item_name",
        "item_description",
        "item_quantity",
        "item_price",
        "item_discount",
        "item_shipping",
    ];


    public function Invoice()
    {
        $this->belongsTo(Invoice::class);
    }
}
