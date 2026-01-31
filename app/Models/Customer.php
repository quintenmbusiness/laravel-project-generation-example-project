<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\BillingAddress;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Order;
use App\Models\ShippingAddress;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Customer extends Model {
use HasFactory;
protected  $table = 'customers';
public  $timestamps = true;
protected  $fillable = [
'name',
'email',
'phone',
'metadata'
];
protected  $casts = ['id' => 'int'];
public function billingAddresses(): HasMany {
return $this->hasMany(BillingAddress::class, 'customer_id', 'id');
}

public function orders(): HasMany {
return $this->hasMany(Order::class, 'customer_id', 'id');
}

public function shippingAddresses(): HasMany {
return $this->hasMany(ShippingAddress::class, 'customer_id', 'id');
}
}