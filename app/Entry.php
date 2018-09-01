<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $table = 'entries';
    
    protected $fillable = [
        'job_id', 'name', 'gender', 'birthday', 'mail', 'tel', 'zip', 'address', 'carreer',
        'qualification', 'myself', 'status'
    ];

    //$entry->job
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    //$entry->user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
