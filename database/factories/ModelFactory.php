<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => 'Paul Mies',
        'email' => 'paulmies.baum@gmail.com',
        'password' => bcrypt('test'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Content::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'attribute' => $faker->word,
        'teaser' => $faker->sentence,
        'content' => $faker->text,
        'sort' => rand(1,10)
    ];
});
