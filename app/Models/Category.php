<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Category extends Model {
use HasFactory;
protected  $table = 'categories';
public  $timestamps = true;
protected  $fillable = [
'slug',
'name',
'description',
'metadata'
];
protected  $casts = ['id' => 'int'];
public function products(): HasMany {
return $this->hasMany(Product::class, 'category_id', 'id');
}
}