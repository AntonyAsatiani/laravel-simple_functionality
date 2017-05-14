<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{

    ///SOFTFELETES LIBRARY
	use SoftDeletes;
    // for temporary delete
    protected $dates = ['deleted_at'];

    // initial post table 
    protected $table = 'post';

    protected $primarykey = 'id';
    // enable soft delete
    protected $SoftDelete = true;

    protected $fillable= ['title','content', 'description'];

 /////////// REVERSE ONE TO ONE RELATION
 public function user()
{
	return $this->belongsTo('App\User');
}
/////////// MORPH MANYTOMANY/////////////////////////////////
public function photos()
{
	return $this->morphMany('App\Photo','imageable');
}



public function tag()
{
    return $this->morphToMany('App\Tag','taggables');
}
}