<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Like extends Model {
use HasFactory;
protected  $table = 'likes';
public  $timestamps = true;
protected  $fillable = [
'likeable_type',
'likeable_id',
'user_id'
];
protected  $casts = [
'id' => 'int',
'likeable_id' => 'int',
'user_id' => 'int'
];
public function user(): BelongsTo {
return $this->belongsTo(User::class, 'user_id', 'id');
}
}