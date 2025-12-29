<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Item;
use Illuminate\Support\Str;
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

    protected static function booted()
    {
        static::creating(function ($model) {
            if (! $model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'Item');
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class, 'transactionId');
    }
}
