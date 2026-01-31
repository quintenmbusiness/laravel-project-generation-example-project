<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coupon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class OrderCoupon extends Model {
use HasFactory;
protected  $table = 'order_coupons';
public  $timestamps = true;
protected  $fillable = [
'order_id',
'coupon_id',
'discount_amount'
];
protected  $casts = [
'id' => 'int',
'order_id' => 'int',
'coupon_id' => 'int',
'discount_amount' => 'float'
];
public function coupon(): BelongsTo {
return $this->belongsTo(Coupon::class, 'coupon_id', 'id');
}

public function order(): BelongsTo {
return $this->belongsTo(Order::class, 'order_id', 'id');
}
}