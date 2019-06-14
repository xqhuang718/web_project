<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Comment;
use App\Http\Requests\CommentRequest;
class CommentsController extends Controller
{
    //
    public function create(CommentRequest $request)
    {
      $recipe = Recipe::findOrFail($request->id);
      $comment = new Comment();
      $comment->recipe_id = $request->recipe_id;
      $comment->comment = $request->comment;
      $comment->name = $request->name;
      $recipe->comments()->save($comment);
      return back();
    }
}
