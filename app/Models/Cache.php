<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cache extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'cache';
    protected $fillable = [
        'key',
        'value',
        'expiration',
    ];
    protected $casts = ['expiration' => 'int'];
}
