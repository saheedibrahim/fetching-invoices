<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_number',
        'customer_name',
        'amount',
        'status',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    // Generate unique invoice number
    protected static function boot()
    {
        parent::boot();        

        static::creating(function ($invoice) {
            if (empty($invoice->invoice_number)) {
                $lastId = static::max('id') ?? 0; // get the highest existing ID
                $nextId = $lastId + 1;

                $invoice->invoice_number = 'INV-' . date('Y') . '-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
