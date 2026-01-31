<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CacheLock extends Model {
use HasFactory;
protected  $table = 'cache_locks';
public  $timestamps = true;
protected  $fillable = [
'key',
'owner',
'expiration'
];
protected  $casts = ['expiration' => 'int'];
}