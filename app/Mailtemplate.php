<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mailtemplate extends Model
{
    protected $fillable = [
        'user_id', 'title', 'body',
    ];
    
    //$mailtemplate->user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
