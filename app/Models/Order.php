<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Order extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'order_number',
        'customer_id',
        'billing_address_id',
        'shipping_address_id',
        'total_amount',
        'discount_amount',
        'status',
        'metadata',
    ];
    protected $casts = [
        'id' => 'int',
        'customer_id' => 'int',
        'billing_address_id' => 'int',
        'shipping_address_id' => 'int',
        'total_amount' => 'float',
        'discount_amount' => 'float',
    ];

    public function billingAddress(): BelongsTo
    {
        return $this->belongsTo(BillingAddress::class, 'billing_address_id', 'id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function shippingAddress(): BelongsTo
    {
        return $this->belongsTo(ShippingAddress::class, 'shipping_address_id', 'id');
    }

    public function orderCoupons(): HasMany
    {
        return $this->hasMany(OrderCoupon::class, 'order_id', 'id');
    }

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }

    public function coupons(): HasManyThrough
    {
        return $this->hasManyThrough(Coupon::class, OrderCoupon::class, 'order_id', 'coupon_id', 'id', 'id');
    }

    public function productVariants(): HasManyThrough
    {
        return $this->hasManyThrough(ProductVariant::class, OrderProduct::class, 'order_id', 'product_variant_id', 'id', 'id');
    }
}
