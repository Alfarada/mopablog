<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\{Category, Post,User};
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [
        //'user_id' => rand(1, 30),
        'user_id' => function () {
            return factory(User::class)->create()->id;    
        },
        // 'category_id'=> rand(1, 20),
        'category_id' => function () {
            return factory(Category::class)->create()->id;
        },
        'title' => $title,
        'slug' => Str::slug($title),
        'excerpt' => $faker->text(200),
        'body'  => $faker->text(500),
        'file'  => $faker->imageUrl($with = 1200, $height = 400),
        'status' => $faker->randomElement(['DRAFT','PUBLISHED'])

    ];
});
