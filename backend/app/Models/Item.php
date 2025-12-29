<?php

namespace App\Models;

use App\Model\Detail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function details(): HasMany
    {
        return $this->hasMany(Detail::class, 'Item');
    }
}
