@extends('layout.app')


@section('content')

{{Form::open(array('action'=> 'test@store','method'=>'POST'))}}
{!!Form::label('title','Title')!!}
{!!Form::text('title',null,['class'=>'form-control'])!!}
<br>
 {!!Form::submit('create post',['class'=>'btn btn-success'])!!}

 {{Form::close()}}
@section('footer')