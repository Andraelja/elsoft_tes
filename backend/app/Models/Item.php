<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Item extends Model
{
    use SoftDeletes;
    protected $table = 'items';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'company_id',
        'item_type_id',
        'item_group_id',
        'item_account_group_id',
        'item_unit_id',
        'code',
        'label',
        'is_active',
    ];

    // Casting
    protected $casts = [
        'is_active' => 'boolean',
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

    // public function company()
    // {
    //     return $this->belongsTo(Company::class, 'company_id');
    // }

    // public function itemType()
    // {
    //     return $this->belongsTo(ItemType::class, 'item_type_id');
    // }

    // public function itemGroup()
    // {
    //     return $this->belongsTo(ItemGroup::class, 'item_group_id');
    // }

    // public function itemAccountGroup()
    // {
    //     return $this->belongsTo(ItemAccountGroup::class, 'item_account_group_id');
    // }

    // public function itemUnit()
    // {
    //     return $this->belongsTo(ItemUnit::class, 'item_unit_id');
    // }
}
