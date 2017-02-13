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
        'name' => $faker->userName,
        'email' => $faker->unique()->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->domainWord,
        'display_name' => $faker->word($nb=2,$asText=false),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});

$factory->define(App\Permission::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->word(),
        'display_name' => $faker->word($nb=2,$asText=false),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
