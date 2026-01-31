<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Like;
use App\Models\Post;
use App\Models\Profile;
use App\Models\RoleUser;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class User extends Model {
use HasFactory;
protected  $table = 'users';
public  $timestamps = true;
protected  $fillable = [
'username',
'email',
'status',
'role',
'preferences',
'last_seen_at'
];
protected  $casts = ['id' => 'int'];
public function comments(): HasMany {
return $this->hasMany(Comment::class, 'user_id', 'id');
}

public function likes(): HasMany {
return $this->hasMany(Like::class, 'user_id', 'id');
}

public function posts(): HasMany {
return $this->hasMany(Post::class, 'user_id', 'id');
}

public function profiles(): HasMany {
return $this->hasMany(Profile::class, 'user_id', 'id');
}

public function roleUsers(): HasMany {
return $this->hasMany(RoleUser::class, 'user_id', 'id');
}

public function roles(): HasManyThrough {
return $this->hasManyThrough(Role::class, RoleUser::class, 'user_id', 'role_id', 'id', 'id');
}
}