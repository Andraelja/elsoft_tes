<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Transaction extends Model
{
    use SoftDeletes;
    protected $table = 'transactions';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'Company',
        'CompanyName',
        'Code',
        'Date',
        'Account',
        'AccountName',
        'Note',
    ];

        /**
     * Auto generate UUID saat create
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            if (! $model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
