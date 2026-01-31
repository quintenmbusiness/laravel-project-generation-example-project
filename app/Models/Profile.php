<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Profile extends Model {
use HasFactory;
protected  $table = 'profiles';
public  $timestamps = true;
protected  $fillable = [
'user_id',
'display_name',
'bio',
'avatar_path'
];
protected  $casts = ['id' => 'int', 'user_id' => 'int'];
public function user(): BelongsTo {
return $this->belongsTo(User::class, 'user_id', 'id');
}
}