<?php

use Illuminate\Database\Seeder;
USE Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
      //  factory('App\User',30)->create();
//DB::statement('SET FOREIGN_KEY_CHECKS=0');
        factory('App\User',30)->create()->each(function($user){
$user->posts()->save(factory('App\Post')->make());
        });
    }
}
