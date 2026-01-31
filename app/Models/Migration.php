<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Migration extends Model {
use HasFactory;
protected  $table = 'migrations';
public  $timestamps = false;
protected  $fillable = ['migration', 'batch'];
protected  $casts = ['id' => 'int', 'batch' => 'int'];
}