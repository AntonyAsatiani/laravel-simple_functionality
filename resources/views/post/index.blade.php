


@extends('layout.app')


@section('content')

<ul>


@foreach($post as $item)
<li><a href="{{route('post.show',$item->id)}}">{{$item->title}}</a></li>


@endforeach

</ul>


@endsection

