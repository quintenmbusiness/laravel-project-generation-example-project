<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class FailedJob extends Model {
use HasFactory;
protected  $table = 'failed_jobs';
public  $timestamps = true;
protected  $fillable = [
'uuid',
'connection',
'queue',
'payload',
'exception',
'failed_at'
];
protected  $casts = ['id' => 'int'];
}