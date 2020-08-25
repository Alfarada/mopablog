<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\{Post,User,Category};
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id' => function () {
            factory(Category::class)->create()->id;
        }
    ];
});
