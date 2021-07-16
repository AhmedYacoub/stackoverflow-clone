<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Answer::class, function (Faker $faker) {
    return [
        'user_id'       =>  function () {
            // return factory(App\Models\User::class)->create();
            return App\Models\User::pluck('id')->random();
        },
        'body'          =>  $faker->paragraphs(rand(3, 7), true),
        'votes_count'   => rand(0, 5)
    ];
});
