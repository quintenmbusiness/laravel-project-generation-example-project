<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class ProductVariant extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'product_variants';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'sku',
        'name',
        'price',
        'stock',
        'attributes',
    ];
    protected $casts = [
        'id' => 'int',
        'product_id' => 'int',
        'price' => 'float',
        'stock' => 'int',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'product_variant_id', 'id');
    }

    public function orders(): HasManyThrough
    {
        return $this->hasManyThrough(Order::class, OrderProduct::class, 'product_variant_id', 'order_id', 'id', 'id');
    }
}
