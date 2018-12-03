<?php

use App\HolidayDestination;
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

$factory->define(HolidayDestination::class, function (Faker $faker) {
    return [
        'name' => 'Name',
        'slug' => $faker->unique()->regexify('[a-z]'),
        'location' => 'Location',
        'description' => 'Description',
        'price' => 200000,
    ];
});
