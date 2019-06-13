<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    //
    protected $table = 'recipes';
    protected $primaryKey = 'id';
    protected $fillable=['title','content','user_id','ingredient'];

    /* recipe is owned by user
    */
    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
    public function collections()
    {
        return $this->belongsToMany('App\Collection');
    }
}
