<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\PostTag;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Post extends Model {
use HasFactory;
protected  $table = 'posts';
public  $timestamps = true;
protected  $fillable = [
'user_id',
'title',
'body',
'is_published',
'metadata'
];
protected  $casts = [
'id' => 'int',
'user_id' => 'int',
'is_published' => 'bool'
];
public function user(): BelongsTo {
return $this->belongsTo(User::class, 'user_id', 'id');
}

public function postTags(): HasMany {
return $this->hasMany(PostTag::class, 'post_id', 'id');
}

public function tags(): HasManyThrough {
return $this->hasManyThrough(Tag::class, PostTag::class, 'post_id', 'tag_id', 'id', 'id');
}
}