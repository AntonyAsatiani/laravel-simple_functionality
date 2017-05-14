<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    

//////////////////////////////REVERSE MANY TO MANY MORPH/////////////////////////////
    public function posts()
    {
    	return $this->morphedBymany('App\post','taggables');
    }
    public function video()
    {
    	return $this->morphedBymany('App\Video','taggables');
    }
}
