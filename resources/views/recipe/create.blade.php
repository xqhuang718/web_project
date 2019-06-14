@extends('layouts.app')
@section('content')

<section class="container">
<h1>Share A New Recipe!</h1>
  <form action="{{url('recipe')}}" method="post" enctype="multipart/form-data">
    <input type = "hidden" name = "_token" value = "{{csrf_token()}}">
    <input type = "hidden" name = "user_id" value = "{{auth()->user()->id}}">

    <h3>Name of Dish</h3>
    <input type = "text" name="title" class = "form-control">
    <h3>Method</h3>
    <label for="image">Upload the image</label>
    <input type="file" name="image" id="image" class = "form-control">
    <label for="content">Steps</label>
    <textarea name="content" id="" cols = "30" rows="10" class="form-control"></textarea>
    <label for="ingredient">ingredient</label>
    <textarea name="ingredient" id="" cols = "30" rows="10" class="form-control"></textarea>
    <input type="submit" value="Submit" class="btn btn-primary">
  </form>

</section>
<section class="container">
@if($errors->any())
      <li>Field cannot be left blank!</li>
@endif
</section>

@stop
