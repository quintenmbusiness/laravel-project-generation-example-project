<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'metadata',
    ];
    protected $casts = ['id' => 'int'];

    public function billingAddresses(): HasMany
    {
        return $this->hasMany(BillingAddress::class, 'customer_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }

    public function shippingAddresses(): HasMany
    {
        return $this->hasMany(ShippingAddress::class, 'customer_id', 'id');
    }
}
