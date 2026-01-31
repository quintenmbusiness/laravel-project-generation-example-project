<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Coupon extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'coupons';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code',
        'type',
        'value',
        'valid_until',
        'active',
    ];
    protected $casts = [
        'id' => 'int',
        'value' => 'float',
        'active' => 'bool',
    ];

    public function orderCoupons(): HasMany
    {
        return $this->hasMany(OrderCoupon::class, 'coupon_id', 'id');
    }

    public function orders(): HasManyThrough
    {
        return $this->hasManyThrough(Order::class, OrderCoupon::class, 'coupon_id', 'order_id', 'id', 'id');
    }
}
