<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class PostTag extends Model {
use HasFactory;
protected  $table = 'post_tags';
public  $timestamps = true;
protected  $fillable = ['post_id', 'tag_id'];
protected  $casts = [
'id' => 'int',
'post_id' => 'int',
'tag_id' => 'int'
];
public function post(): BelongsTo {
return $this->belongsTo(Post::class, 'post_id', 'id');
}

public function tag(): BelongsTo {
return $this->belongsTo(Tag::class, 'tag_id', 'id');
}
}