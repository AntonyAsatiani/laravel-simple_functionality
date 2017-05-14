<?php

use App\post;
use App\User;
use App\Role;
use App\Country;
use App\Photo;
use App\Tag;
use App\Video;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () 
{

    return view('welcome');

     });
     
     
     // simple routing/////////////////////////////////////////////////
     //Route::get('/contact', function () 
     //{
     //    return "hi I am contact";
     //
     //});
     //
     //Route::get('/about', function () 
     //{
     //    return 'hi I am about';
     //
     //});
     // route post by id
     //Route::get('/post/{id}/{name}', function($id,$name)
     //{
     //return "this is post number " . $id . " name is " . $name;
     //
     //});
     //   
     //Route::get('/admin/post/example',array('as' =>'admin.home',function()
     //{
     //	$url = route('admin.home');
     //
     //	return "this url is ". $url;
     //
     //}
     //));
     //*/
/*
/////route init contoller

   Route::get('/test/{id}','test@index');
   
   Route::get('/contact','test@contact');
   // pass username email and id through get
   Route::get('/post/{id}/{username}/{mail}','test@ShowPost');
   

   // insert in database (just sql)////
   

   Route::get('/insert',function()
   	{
       DB::insert('insert into post(title,content) values(?,?)',['laravel is    awsome',"this article is about laravel"]);   
   
   	});
/*      //read data


Route::get('/read', function()
{
	$result = DB::select('select * from post where id=?',[1]);

	foreach ($result as $post) {
		return $post->title;
	}
	
}
	);
	*/
///   UPDATE DATA   ////


Route::get('/update', function()
{

$update = DB::update('update post set title="updated title" where id=?',[1]);

return $update;
});

//DELETE DATA



Route::get('/delete', function()
{

$delete = DB::delete('delete from post where id =?', [1]);
return $delete;
});
	


	 //// READ ELOQUENT ////////
Route::get('/read', function()
	{
      
      $posts = post::all();
      foreach($posts as $item)
        {
        	return $item->content;
        }

});

///////// RETRIVE DATA ////////////

Route::get('retrive',function(){

	$post = post::where('id',2)->orderBy('id','idesc')->take(1)->get();

	return $post;
});


/////////// FIND POST WITH ID 1 AND RETURN//////////////////////////////////////////
Route::get('more',function(){

	$post = post::findOrFail(1);
	return $post;
	
	
});


Route::get('/up', function(){
	 $count = post::count();
      
	for($i=0;$i<$count;$i++) 
{
	post::where('is_admin',1)->update(['title'=>'updated title','content'=>'updated content','is_admin'=>2]);
}


});

/////////// INSERT DATA WITH ELOQUENT////////////////////////////////////////////
Route::get('/eloinsert',function(){
for($i=0;$i<5;$i++) 
{

     $post = new post;
     $post->title= 'new title';
     $post->content='new content';
     $post->save();

}
});
 ////////////// DELETE ALL POSTS IN POST TABLE/////////////////////////////////////
Route::get('/terminate',function()
	{
		$count = post::count();
		$first_row = post::first();
		

		for($i=$first_row->id;$i<$count;$i++) 
	{
		
		//$post=post::find($i);
		//$post->delete();
	    
	}
	if($count ==0)
	{
		echo 'erased';
	}
	});
    ///// DELETE POSTS BY ID//////////////////////////////////////////////////
Route::get('/terminate2',function()
	{
		post::destroy(3);

	//	post::destroy([3,5]); destroy multiply rows
	});

/// SOFT DELETE IN ELOQUENT////////////////////////////////////////////////////
Route::get('/softdelete',function(){
    
    post::find(9)->delete();

});

/////////// READ SOFT DELETED DATA////////////////////////////////////////////
Route::get('/readdeleted',function()
{
	$post = post::withTrashed()->where('id',9)->get();
	return $post;

});
////////////RESTORE SOFT DELTED FILES////////////////////////////////////
Route::get('/restore',function(){

	$post = post::withTrashed()->where('id',9)->restore();
	return $post;
});

///////////// ONE TO ONE RELATION  RETRIVE POST WITH USER_ID//////////////
Route::get('/user/{id}/post', function($id)
	{
		return User::find($id)->post;
	    
	});
///////////////////ONE TO ONE RELATION  RETRIEV OWNER OF THE POST
Route::get('post/{id}/user',function($id)
	{
		return Post::find($id)->user->name;
	});
//////////////// ONE TO MANY RELATION ONE USER MANY POSTS
Route::get('posts', function()
	{
		$user = User::find(1);
		foreach ($user->posts as $post) {
			echo $post->title . " <br>";
		}
	});
///////////////MANY TO MANY, MANY USER MANY POSTS FIND USER HIS/HER ROLE AND POSTS
Route::get('/user/{id}/role', function($id)
{
  $user = User::find($id)->roles()->orderBy('id','desc')->get();
 // $user = User::find($id);

  //foreach ($user->roles as $role) {
  	
  	return $user;

  
  
});

Route::get('/user/pivot', function()
	{

		$user = User::find(1);

		foreach ($user->roles as $role) {
			
			return $role->pivot->created_at;

			
			}
	});


// has many through relationship (intermediate table)
Route::get('/user/country', function()
	{
        $country = Country::find(2);
        foreach ($country->post as $item) {
        	
                 return $item->title;
        	}

	});
//////////////////POLYMOROPHIC RELATIONSHIP///////////////////////////
Route::get('/user/photos', function()
{
 $user = User::find(1);
 
 foreach ($user->photos as $photo) 
 	
 	return $photo->path;
 
}
	);

Route::get('/photo/{id}/post', function($id)
{
	$photo = Photo::findOrFail($id);

	return $photo;
});

Route::get('/post/tag', function()
{
   $tag = Tag::find(1);

    //var_dump($tag->posts);

    foreach ($tag->Video as $item) {
    	return $item;

    }
   foreach ($tag->posts as $item) {
    	return $item;

    }
  });


Route::resource('/post','test');
