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
	$name = $faker->words($nb = 2, $asText = true);
    return [
        'name' => $name,
        'slug' => strtolower(preg_replace('/\s+/', '-', $name)),
        'price' => $faker->numberBetween($min = 50, $max = 500),
        'description' => $faker->paragraph,
        'caption' => $faker->sentence,
        'sku' => $faker->uuid,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'thumbnail' => $faker->imageUrl($width = 150, $height = 150),
        'published' => $faker->randomElement($array = array (true,false)),
        'views' => $faker->numberBetween($min = 1000, $max = 9000),
        'rating_cache' => $faker->numberBetween($min = 0, $max = 5),
        'rating_count' => $faker->numberBetween($min = 1000, $max = 9000)

    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    $name = $faker->words($nb = 2, $asText = true);
    return [
        'name' => $name,
        'slug' => strtolower(preg_replace('/\s+/', '-', $name)),
        'description' => $faker->paragraph,
    ];
});
