<?php

use Illuminate\Database\Seeder;

use App\Recipe;

class RecipeTableSeeder extends Seeder
{

    public function run()
    {
        // $this->call(UsersTableSeeder::class);
      DB::table('recipes')->truncate();

      for($i=0; $i<10;$i++)
      {
        Recipe::create([
        'title' => str_random(10),
        'content'=>str_random(255)
      ]);
      }
    }
}
