@extends('layout.app')


@section('content')

{!! Form::model($post , ['method' => 'PATCH' , 'action' => ['test@update', $post->id]]) !!}




{!!Form::label('title','title')!!}
{!!Form::text('title',null,['class'=>'form-control'])!!}
<br>
 {!!Form::submit('create post',['class'=>'btn btn-success'])!!}

 {!!Form::close()!!}

{!!Form::open(array('action'=>['test@destroy',$post->id],'method'=>'DELETE'))!!}

{!!csrf_token()!!}

{!!Form::submit('Delete post',['class'=>'btn btn-danger'])!!}

{!!Form::close()!!}



@section('footer')