<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\BillingAddress;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ShippingAddress extends Model {
use HasFactory;
protected  $table = 'shipping_addresses';
public  $timestamps = true;
protected  $fillable = [
'customer_id',
'label',
'line1',
'line2',
'city',
'postal_code',
'country',
'metadata'
];
protected  $casts = ['id' => 'int', 'customer_id' => 'int'];
public function customer(): BelongsTo {
return $this->belongsTo(Customer::class, 'customer_id', 'id');
}

public function orders(): HasMany {
return $this->hasMany(Order::class, 'shipping_address_id', 'id');
}

public function billingAddresses(): HasManyThrough {
return $this->hasManyThrough(BillingAddress::class, Order::class, 'shipping_address_id', 'billing_address_id', 'id', 'id');
}

public function customers(): HasManyThrough {
return $this->hasManyThrough(Customer::class, Order::class, 'shipping_address_id', 'customer_id', 'id', 'id');
}
}