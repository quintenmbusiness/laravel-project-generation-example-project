<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class OrderProduct extends Model {
use HasFactory;
protected  $table = 'order_products';
public  $timestamps = true;
protected  $fillable = [
'order_id',
'product_variant_id',
'quantity',
'unit_price',
'total_price',
'metadata'
];
protected  $casts = [
'id' => 'int',
'order_id' => 'int',
'product_variant_id' => 'int',
'quantity' => 'int',
'unit_price' => 'float',
'total_price' => 'float'
];
public function order(): BelongsTo {
return $this->belongsTo(Order::class, 'order_id', 'id');
}

public function productVariant(): BelongsTo {
return $this->belongsTo(ProductVariant::class, 'product_variant_id', 'id');
}
}