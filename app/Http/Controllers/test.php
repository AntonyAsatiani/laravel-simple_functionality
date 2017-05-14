<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\post;

class test extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $post = post::all();

     return view('post.index' , compact('post'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('post.create');      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       // show title on the page 
       // return $request->title;
        
   //    save title in database
        post::create($request->all());
        //$input = $request->all();
      //  $input['title'] = $request->title;
       // post::create($request->all());

        //$post= new post;
        //$post->title = $request->title;
        //$post->save();

      return redirect('/post');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
      $post = post::findOrFail($id);
       
      return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::findOrFail($id);

        return view('post.edit',compact('post'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
       $post = post::findOrFail($id);
        
       $post->update($request->all());

       return redirect("/post");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::findOrFail($id);

        $post->delete();

        return redirect('/post');
    }

public function ShowView()
{
    return view('contact');
}
public function ShowPost($id,$username,$mail)
{
if(view()->exists('post'))
//return view('post')->with('id',$id);
 return view('post',compact('id','username','mail'));
else
    return "does not exist";
}
public function contact()
{
    $people = ['anton','aleksander'];

    return view('contact',compact('people'));
}
}
