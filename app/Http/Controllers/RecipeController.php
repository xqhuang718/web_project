<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\User;
use Storage;
use App\Http\Requests\RecipeRequest;
use \App\Comment;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
class RecipeController extends Controller
{
    //

    public function __construct() {
        $this->middleware('auth',['except'=>['index','search']]);
    }

    public function index()
    {
        $query = Recipe::latest()->get();
        return view('recipe.recipes',compact('query'));
    }

    public function create()
    {
      return view('recipe.create');
    }

    public function store(RecipeRequest $request)
    {
      if ($request->hasFile('image')) {
          $imageName = $request->image->store('');
          Storage::move($imageName, 'public/'.$imageName);
        }
      $recipe = new Recipe();
      $recipe->ingredient= $request->ingredient;
      $recipe->title = $request->title;
      $recipe->content = $request->content;
      $recipe->image = $imageName;
      $recipe->id = $request->id;
      $recipe->user_id =$request->user_id;
      $recipe->save();
      //Recipe::create($request->all());
      return redirect('recipe');
    }

    public function edit($id)
    {
      $query = Recipe::find($id);
      return view('recipe.edit',compact('query'));
    }

    public function update(Request $request,$id)
    {
      if ($request->hasFile('image')) {
          $imageName = $request->image->store('');
          Storage::move($imageName, 'public/'.$imageName);
        }
      Recipe::where('id',$id)->update([
        'title'=>$request->get('title'),
        'content'=>$request->get('content'),
        'ingredient'=>$request->get('ingredient'),
        'image'=>$imageName
      ]);
      return redirect('recipe');
    }

    public function destroy($id)
    {
      $post = Recipe::whereId($id)->delete();
      return redirect('recipe');
    }
    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);


        return view('recipe.show',compact('recipe'));
    }
    public function myrecipe()
    {
        $recipes = User::find(auth()->user()->id)->recipes;

        return view('recipe.myrecipe',compact('recipes'));
    }
    public function search(Request $request)
    {
      $search = $request->get('search');
      $ss = $request->get('ss');
      $recipes = DB::table('recipes')->where($ss,'like','%'.$search.'%')->paginate(5);
      //dd($recipes);
      return view('recipe/recipes',['query'=>$recipes]);
    }



}
