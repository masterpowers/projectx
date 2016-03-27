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
        'username' => $faker->username,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
	$name = $faker->name;
    return [
        'name' => $name,
        'slug' => strtolower(preg_replace('/\s+/', '_', $name)),
        'price' => $faker->numberBetween($min = 50, $max = 500),
        'description' => $faker->paragraph,
        'caption' => $faker->sentence,
        'sku' => $faker->uuid
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'slug' => strtolower(preg_replace('/\s+/', '_', $name)),
        'description' => $faker->paragraph,
    ];
});
