<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Job extends Model {
use HasFactory;
protected  $table = 'jobs';
public  $timestamps = true;
protected  $fillable = [
'queue',
'payload',
'attempts',
'reserved_at',
'available_at'
];
protected  $casts = [
'id' => 'int',
'attempts' => 'int',
'reserved_at' => 'int',
'available_at' => 'int'
];
}