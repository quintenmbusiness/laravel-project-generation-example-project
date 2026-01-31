<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class ShippingAddress extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'shipping_addresses';
    protected $primaryKey = 'id';
    protected $fillable = [
        'customer_id',
        'label',
        'line1',
        'line2',
        'city',
        'postal_code',
        'country',
        'metadata',
    ];
    protected $casts = ['id' => 'int', 'customer_id' => 'int'];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'shipping_address_id', 'id');
    }

    public function billingAddresses(): HasManyThrough
    {
        return $this->hasManyThrough(BillingAddress::class, Order::class, 'shipping_address_id', 'billing_address_id', 'id', 'id');
    }

    public function customers(): HasManyThrough
    {
        return $this->hasManyThrough(Customer::class, Order::class, 'shipping_address_id', 'customer_id', 'id', 'id');
    }
}
