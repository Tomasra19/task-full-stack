<?php

use Faker\Generator as Faker;

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
    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'street' => $faker->streetName,
        'suite' => $faker->text(10),
        'city' => $faker->city,
        'zipcode' => $faker->postcode,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude,
        'phone' => $faker->phoneNumber,
        'website' => $faker->domainName,
        'cName' => $faker->company,
        'catchPhrase' => $faker->text(25),
        'bs' => $faker->text(25),
    ];
});
