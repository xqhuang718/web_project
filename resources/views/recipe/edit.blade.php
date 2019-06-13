@extends('layouts.app')
@section('content')
<section class="container">
  <form action="{{url('recipe/'.$query->id)}}" method="post">
    <input type = "hidden" name = "_token" value = "{{csrf_token()}}">
    <input type = "hidden" name = "_method" value ="PUT">
    <input type = "text" name="title" class = "form-control" value="{{$query->title}}">
    <textarea name="content" id="" cols = "30" rows="10" class="form-control">{{$query->content}}</textarea>
    <input type="submit" value="Submit" class="btn btn-primary">
  </form>
  <form action="{{url('recipe/'.$query->id)}}" method = "post">
    {{csrf_field()}}
    <input type ="hidden" name="_method" value="DELETE" >
    <input type ="submit" class = "btn btn-danger"  value="Delete">
  </form>
</section>


@stop
