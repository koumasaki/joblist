<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'user_id', 'job_name', 'job_status', 'job_copy', 'detail', 'qualification', 'release',
    ];
    
    //$job->user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //$job->entries
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
