<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'firstName'             => $faker->firstName,
        'lastName'              => $faker->lastName,
        'email'                 => $faker->email,
        'middleName'            => $faker->lastName,
        'password'              => \Illuminate\Support\Facades\Hash::make('test-password'),
        'address'               => $faker->address,
        'zipCode'               => $faker->postcode,
        'username'              => $faker->userName,
        'city'                  => $faker->city,
        'state'                 => $faker->state,
        'country'               => $faker->country,
        'phone'                 => $faker->phoneNumber,
        'mobile'                => $faker->phoneNumber,
        'role'                  => \App\Models\User::BASIC_ROLE,
        'isActive'              => rand(0, 1),
        'profileImage'          => $faker->imageUrl('100')
    ];
});
