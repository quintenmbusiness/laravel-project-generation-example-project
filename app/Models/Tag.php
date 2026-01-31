<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostTag;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tag extends Model {
use HasFactory;
protected  $table = 'tags';
public  $timestamps = true;
protected  $fillable = ['name'];
protected  $casts = ['id' => 'int'];
public function postTags(): HasMany {
return $this->hasMany(PostTag::class, 'tag_id', 'id');
}

public function posts(): HasManyThrough {
return $this->hasManyThrough(Post::class, PostTag::class, 'tag_id', 'post_id', 'id', 'id');
}
}