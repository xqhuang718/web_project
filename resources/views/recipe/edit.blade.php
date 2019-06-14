@extends('layouts.app')
@section('content')
<!--
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
-->
<section class="container">
<h1>Share A New Recipe!</h1>
  <form action="{{url('recipe/'.$query->id)}}" method="post" enctype="multipart/form-data">
    <input type = "hidden" name = "_token" value = "{{csrf_token()}}">
    <input type = "hidden" name = "_method" value ="PUT">
    <input type = "hidden" name = "user_id" value = "{{auth()->user()->id}}">

    <h3>Name of Dish</h3>
    <input type = "text" name="title" class = "form-control" value="{{$query->title}}">
    <h3>method</h3>
    <label for="image">Upload the image</label>
    <input type="file" name="image" id="image" class = "form-control" value="{{$query->image}}">
    <label for="content">Steps</label>
    <textarea name="content" id="" cols = "30" rows="10" class="form-control">{{$query->content}}</textarea>
    <label for="ingredient">ingredient</label>
    <textarea name="ingredient" id="" cols = "30" rows="10" class="form-control">{{$query->ingredient}}</textarea>
    <input type="submit" value="Submit" class="btn btn-primary">
  </form>

</section>

@stop
