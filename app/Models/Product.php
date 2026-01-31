<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'products';
    protected $fillable = [
        'sku',
        'title',
        'description',
        'category_id',
        'price',
        'metadata',
        'active',
    ];
    protected $casts = [
        'id' => 'int',
        'category_id' => 'int',
        'price' => 'float',
        'active' => 'bool',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productVariants(): HasMany
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }
}
