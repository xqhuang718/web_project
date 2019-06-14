@extends('layouts.app')
@section('content')
<section class="container">
  <h1>My Recipe</h1>
  <table class="table table-hover">

    @foreach($recipes as $var)
      <tr class="AutoNewline">

        <td><a href="{{url('/recipe',$var->id)}}" ><img src="{{url('/storage/'.$var->image) }}" alt="" class=".img-fluid img-thumbnail" width="200" height="200"></a></td>
        <td><a href = "{{url('/recipe',$var->id)}}"><font size="5">{{$var->title}}</font></a></td>


        <!--
        <td><a href = "{{url('/recipe',$var->id)}}">{{$var->title}}</a></td>
        -->
        <td><a href="{{ url('recipe/'.$var->id.'/edit')}}" role = "btn" class= "btn btn-warning">Edit
        </a></td><td>
        <form action="{{url('recipe/'.$var->id)}}" method = "post">
          {{csrf_field()}}
          <input type ="hidden" name="_method" value="DELETE" >
          <input type ="submit" class = "btn btn-danger"  value="Delete">
        </form></td>

    </tr>
    @endforeach
  </table>
</section>
@stop
