<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    protected $fillable = [
        'user_id', 'section', 'name', 'zip', 'address', 'tel', 'email'
    ];
    
    //$mailtemplate->user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
