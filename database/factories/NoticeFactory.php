<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Notice;
use Faker\Generator as Faker;

$factory->define(Notice::class, function (Faker $faker) {
    return [
        'user_id' => 2,
        'title' => $faker->title,
        'description' => $faker->text,
    ];
});
