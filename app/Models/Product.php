<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model {
use HasFactory;
protected  $table = 'products';
public  $timestamps = true;
protected  $fillable = [
'sku',
'title',
'description',
'category_id',
'price',
'metadata',
'active'
];
protected  $casts = [
'id' => 'int',
'category_id' => 'int',
'price' => 'float',
'active' => 'bool'
];
public function category(): BelongsTo {
return $this->belongsTo(Category::class, 'category_id', 'id');
}

public function productVariants(): HasMany {
return $this->hasMany(ProductVariant::class, 'product_id', 'id');
}
}