<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company', 'display_url', 'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //$user->jobs
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    //$user->entries
    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
    //$user->sendmails
    public function sendmails()
    {
        return $this->hasMany(Sendmail::class);
    }
    //$user->mailtemplates
    public function mailtemplates()
    {
        return $this->hasMany(Mailtemplate::class);
    }
}
