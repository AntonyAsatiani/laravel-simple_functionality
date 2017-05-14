<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
     public function post(){
  return $this->hasManyThrough('App\post','App\User','contry_id');
}
}
