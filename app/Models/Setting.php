<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Setting extends Model {
use HasFactory;
protected  $table = 'settings';
public  $timestamps = true;
protected  $fillable = ['key', 'value'];
protected  $casts = ['id' => 'int'];
}