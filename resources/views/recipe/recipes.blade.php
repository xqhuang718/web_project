@extends('layouts.app')
@section('content')
<section class="container">
  <form action = "{{url('search')}}" method="get">
    {{ csrf_field() }}
    <div class= "input-group col-sm-5">
      <div class="px-2 ">
      <select name="ss" >
    　<option value="title">Dish Name</option>
    　<option value="ingredient">Ingredient</option>
    </select>
  </div>
      <input type="search" name="search" class="form-control">
      <span class="input-group-prepend">
        <button type="submit" class="btn btn-primary">Search</button>
      </span>
    </div>
  </form>
  <table class="table table-hover">

    @foreach($query as $var)
      <tr class="AutoNewline">
        <td width="25%">
        <a href="{{url('/recipe',$var->id)}}" ><img src="{{url('/storage/'.$var->image) }}" alt="" class=".img-fluid img-thumbnail" width="200" height="200"></a>
      </td>
        <td width="25%">
        <a href = "{{url('/recipe',$var->id)}}"><font size="5">{{$var->title}}</font></a>
      </td>
      <td width="25%">
        <font size="5">{{$var->ingredient}}</font>
      </td>
        <!--
        <td><a href = "{{url('/recipe',$var->id)}}">{{$var->title}}</a></td>
        <td><a href="{{ url('recipe/'.$var->id.'/edit')}}" role = "btn" class= "btn btn-warning">Edit
        </a></td><td>
        <form action="{{url('recipe/'.$var->id)}}" method = "post">
          {{csrf_field()}}
          <input type ="hidden" name="_method" value="DELETE" >
          <input type ="submit" class = "btn btn-danger"  value="Delete">
        </form></td>
      -->
    </tr>
    @endforeach
  </table>
</section>
@stop
