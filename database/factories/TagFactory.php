<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Tag::class, function (Faker $faker) {
    $title = $faker->unique()->word(5);
    return [
        'title' => $title,
        'slug' => Str::slug($title)
    ];
});
