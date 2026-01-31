<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class ProductVariant extends Model {
use HasFactory;
protected  $table = 'product_variants';
public  $timestamps = true;
protected  $fillable = [
'product_id',
'sku',
'name',
'price',
'stock',
'attributes'
];
protected  $casts = [
'id' => 'int',
'product_id' => 'int',
'price' => 'float',
'stock' => 'int'
];
public function product(): BelongsTo {
return $this->belongsTo(Product::class, 'product_id', 'id');
}

public function orderProducts(): HasMany {
return $this->hasMany(OrderProduct::class, 'product_variant_id', 'id');
}

public function orders(): HasManyThrough {
return $this->hasManyThrough(Order::class, OrderProduct::class, 'product_variant_id', 'order_id', 'id', 'id');
}
}