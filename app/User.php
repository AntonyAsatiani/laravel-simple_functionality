<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    ///////////////// ONE TO ONE//////////////////////

    public function post()
    {
        return $this->hasOne('App\post');
    }
////////////////////ONE TO MANY//////////////////////////////////////
    public function posts()
    {
        return $this->hasMany('App\post');
    }
    
////////////////////// MANY TO MANY/////////////////////////////////////
    public function roles()

    {
        return $this->belongsToMany('App\Role')->withPivot('created_at');
        
    }

    ////////////////MORPH MANY TO MANY////////////////////////
    public function photos()
{
    return $this->morphMany('App\Photo','imageables');
}

}
