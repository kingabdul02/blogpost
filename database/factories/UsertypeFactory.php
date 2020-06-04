<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Usertype;
use Faker\Generator as Faker;

$factory->define(Usertype::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
    ];
});
