<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Template;
use Faker\Generator as Faker;

$factory->define(Template::class, function (Faker $faker) {
    return [
        'uid' => $faker->word,
        'title' => $faker->word,
        'admin_only' => 0,
        'show_content_editor' => 1
    ];
});
