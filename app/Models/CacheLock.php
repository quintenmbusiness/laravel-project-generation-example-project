<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CacheLock extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $timestamps = true;
    protected $table = 'cache_locks';
    protected $primaryKey = 'key';
    protected $fillable = [
        'key',
        'owner',
        'expiration',
    ];
    protected $casts = ['expiration' => 'int'];
}
