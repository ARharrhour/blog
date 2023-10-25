<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        "user_id"=>factory(User::class),
        "title"=>$faker->sentence(7),
        "body"=>$faker->text(),
        "post_image"=>$faker->imageUrl()
    ];
});
