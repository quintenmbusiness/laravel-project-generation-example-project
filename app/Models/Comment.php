<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Comment extends Model {
use HasFactory;
protected  $table = 'comments';
public  $timestamps = true;
protected  $fillable = [
'commentable_type',
'commentable_id',
'user_id',
'body'
];
protected  $casts = [
'id' => 'int',
'commentable_id' => 'int',
'user_id' => 'int'
];
public function user(): BelongsTo {
return $this->belongsTo(User::class, 'user_id', 'id');
}
}