@extends('layout.app')


@section('content')
<h1>{{$post->id}}</h1>
<h2><a href="{{route('post.edit', $post->id)}}">{{$post->title}}</a></h2>
<p>{{$post->content}}</p>


@endsection