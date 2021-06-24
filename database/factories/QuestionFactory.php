<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'user_id'   =>  function () {
            return factory(User::class)->create();
        },
        'title'     =>  rtrim($faker->sentence(rand(5, 10)), "."),  // Generate a random sentence between 5 and 10 characters
        'body'      =>  $faker->paragraph(rand(3, 7)),
        'views'     =>  rand(0, 10),
        'answers'   =>  rand(0, 10),
        'votes'     =>  rand(0, 10),
    ];
});
