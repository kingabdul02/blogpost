<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blogpost;
use Faker\Generator as Faker;

$factory->define(Blogpost::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'content' => $faker->paragraphs(3, true),
        'author_id' => $faker->randomNumber(),
        'category_id' => $faker->randomNumber(),
    ];
});
