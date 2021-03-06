<?php

use Faker\Generator as Faker;
//use Faker\Provider\Image;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
	//$faker->addProvider(new Faker\Provider\Internet($faker));
	//$faker->addProvider(new Faker\Provider\Image($faker));
    static $password;

    return [
        'name' => $faker->name,
        'username'=> $faker->userName,
        'avatar'=> $faker->imageUrl($width = 640, $height = 480),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'rol' => $faker->randomElement($array = array ('Admin','Editor','Helper')),
        'status'=> $faker->numberBetween($min = 1, $max = 2),
    ];
});
