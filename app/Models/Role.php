<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoleUser;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Role extends Model {
use HasFactory;
protected  $table = 'roles';
public  $timestamps = true;
protected  $fillable = ['name'];
protected  $casts = ['id' => 'int'];
public function roleUsers(): HasMany {
return $this->hasMany(RoleUser::class, 'role_id', 'id');
}

public function users(): HasManyThrough {
return $this->hasManyThrough(User::class, RoleUser::class, 'role_id', 'user_id', 'id', 'id');
}
}