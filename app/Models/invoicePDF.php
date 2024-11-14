<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class invoicePDF extends Model
{
    use SoftDeletes;

    protected $table = 'invoice_pdfs';

    protected $fillable = [
        'invoice_id',
        'pdf_name',
        'pdf_location',
    ];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}
