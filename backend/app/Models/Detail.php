<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $table = 'details';

    protected $fillable = [
        'index',
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
}
