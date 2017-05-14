@extends('layout.app')

@section('content')

@if(count($people))
<ul>
@foreach($people as $person)
<li>{{$person}}</li>

@endforeach
</ul>
@endif

@stop