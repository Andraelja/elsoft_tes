<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Item;
use App\Models\Transaction;

class Detail extends Model
{
    protected $table = 'details';

    protected $fillable = [
        'index',
        'transactionId',
        'Item',
        'ItemName',
        'Quantity',
        'ItemUnit',
        'ItemUnitName',
        'Note',
    ];

    protected $casts = [
        'Quantity' => 'float',
    ];

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'Item');
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'transactionId');
    }
}
