<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sendmail extends Model
{
    protected $fillable = [
        'title', 'body',
    ];

    //$sendmail->user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
