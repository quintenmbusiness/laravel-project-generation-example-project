<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Cache extends Model {
use HasFactory;
protected  $table = 'cache';
public  $timestamps = true;
protected  $fillable = [
'key',
'value',
'expiration'
];
protected  $casts = ['expiration' => 'int'];
}