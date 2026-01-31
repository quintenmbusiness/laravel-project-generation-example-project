<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderCoupon extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'order_coupons';
    protected $primaryKey = 'id';
    protected $fillable = [
        'order_id',
        'coupon_id',
        'discount_amount',
    ];
    protected $casts = [
        'id' => 'int',
        'order_id' => 'int',
        'coupon_id' => 'int',
        'discount_amount' => 'float',
    ];

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class, 'coupon_id', 'id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
