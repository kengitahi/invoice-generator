<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'invoice_id', //Each invoiceItem belongs to invoice
        'item_name',
        'item_description',
        'item_quantity',
        'item_price',
        'item_discount',
        'item_shipping',
    ];

    protected $casts = [
        'item_quantity' => 'integer',
        'item_price' => 'float',
        'item_discount' => 'float',
        'item_shipping' => 'float',
    ];

    public function invoice()
    {
        $this->belongsTo(Invoice::class);
    }
}
