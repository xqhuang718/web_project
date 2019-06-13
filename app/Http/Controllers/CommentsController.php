<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Comment;
class CommentsController extends Controller
{
    //
    public function create(Request $request)
    {
      $recipe = Recipe::findOrFail($request->id);
      $comment = new Comment();
      $comment->recipe_id = $request->recipe_id;
      $comment->comment = $request->comment;
      $comment->name = $request->name;
      $recipe->comments()->save($comment);
      return view('recipe.show',compact('recipe'));
    }
}
