<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'invoice_number',
        'invoice_date',
        'invoice_terms',
        'invoice_conditions',
        'invoice_notes',

        'sender_name',
        'sender_business_name',
        'sender_email',
        'sender_logo',
        'sender_tel',
        'sender_website',
        'sender_business_number',

        'client_name',
        'client_email',
        'client_tel',
        'client_business_number',

        'grand_total',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'invoice_date' => 'datetime',
        'grand_total' => 'float',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }
}
