<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\BillingAddress;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Customer;
use App\Models\ShippingAddress;
use App\Models\OrderCoupon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\OrderProduct;
use App\Models\Coupon;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Order extends Model {
use HasFactory;
protected  $table = 'orders';
public  $timestamps = true;
protected  $fillable = [
'order_number',
'customer_id',
'billing_address_id',
'shipping_address_id',
'total_amount',
'discount_amount',
'status',
'metadata'
];
protected  $casts = [
'id' => 'int',
'customer_id' => 'int',
'billing_address_id' => 'int',
'shipping_address_id' => 'int',
'total_amount' => 'float',
'discount_amount' => 'float'
];
public function billingAddress(): BelongsTo {
return $this->belongsTo(BillingAddress::class, 'billing_address_id', 'id');
}

public function customer(): BelongsTo {
return $this->belongsTo(Customer::class, 'customer_id', 'id');
}

public function shippingAddress(): BelongsTo {
return $this->belongsTo(ShippingAddress::class, 'shipping_address_id', 'id');
}

public function orderCoupons(): HasMany {
return $this->hasMany(OrderCoupon::class, 'order_id', 'id');
}

public function orderProducts(): HasMany {
return $this->hasMany(OrderProduct::class, 'order_id', 'id');
}

public function coupons(): HasManyThrough {
return $this->hasManyThrough(Coupon::class, OrderCoupon::class, 'order_id', 'coupon_id', 'id', 'id');
}

public function productVariants(): HasManyThrough {
return $this->hasManyThrough(ProductVariant::class, OrderProduct::class, 'order_id', 'product_variant_id', 'id', 'id');
}
}