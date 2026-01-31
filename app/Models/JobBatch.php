<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class JobBatch extends Model {
use HasFactory;
protected  $table = 'job_batches';
public  $timestamps = true;
protected  $fillable = [
'name',
'total_jobs',
'pending_jobs',
'failed_jobs',
'failed_job_ids',
'options',
'cancelled_at',
'finished_at'
];
protected  $casts = [
'total_jobs' => 'int',
'pending_jobs' => 'int',
'failed_jobs' => 'int',
'cancelled_at' => 'int',
'finished_at' => 'int'
];
}