<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class RoleUser extends Model {
use HasFactory;
protected  $table = 'role_users';
public  $timestamps = true;
protected  $fillable = ['role_id', 'user_id'];
protected  $casts = [
'id' => 'int',
'role_id' => 'int',
'user_id' => 'int'
];
public function role(): BelongsTo {
return $this->belongsTo(Role::class, 'role_id', 'id');
}

public function user(): BelongsTo {
return $this->belongsTo(User::class, 'user_id', 'id');
}
}