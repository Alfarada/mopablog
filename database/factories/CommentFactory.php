<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\{User,Post,Comment};
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->paragraph(),
        'post_id' => function () {
            return factory(Post::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
