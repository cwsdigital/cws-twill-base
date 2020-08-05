<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Homepage;
use App\Models\Page;
use Faker\Generator as Faker;

$factory->define(Homepage::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'published' => $faker->boolean,
    ];
});
