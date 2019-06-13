@extends('layouts.app')
@section('bg-img',asset(Storage::disk('local')->url($recipe->image)))

@section('content')


<section class="container">
  <img src="{{url('/storage/'.$recipe->image) }}" alt="" class="img-thumbnail" width="400" height="400">
  <h1>{{$recipe->title}}</h1>
  <td><a href="{{ url('recipe/'.$recipe->id.'/edit')}}" role = "btn" class= "btn btn-warning">Edit
  </a></td>
  <a href = "{{url('/add-to-collection/'.$recipe->id)}}"><font size="5">Collect</font></a>
  <article>
    {{$recipe->content}}
  </article>
  <div class ="row">
    <ul class="list-group">
        @foreach($recipe->comments as $comment)
          <li class="list-group-item">
              <h5>{{$comment->name}}</h5>
                <div>
                  {{$comment->comment}}
                </div>
                </li>
              @endforeach
    </ul>
  </div>

  <div class = "row">
    <ul class="list-group">
        <form action="{{url('recipe/'.$recipe->id.'/comment')}}" method="POST">
            {{csrf_field()}}
              <input type="hidden" name="recipe_id" value="{{$recipe->id}}"/>
              <input type="hidden" name="name" value="{{auth()->user()->name}}"/>
                  <li class="list-group-item">
                  <textarea name="comment" class="form-control" cols = "30" rows="2"></textarea>
                  <button class="btn btn-primary" type="submit">Reply</button>
                  </li>
          </form>

    </ul>
  </div>
</section>

@stop
