<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Book::class, function (Faker $faker) {
    $title = $faker->sentence(rand(3,8), true);
    $author = $faker->name;
    $txt = $faker->realText(rand(100, 1000));

    $data = [
        'category_id'   => rand(1, 10),
        'user_id'       => (rand(1, 5) == 5) ? 1 : 2,
        'slug'          => Str::of($title)->slug(),
        'title'         => $title,
        'author'        => $author,
        'content_raw'   => $txt,
        'content_html'   => $txt,
    ];

    return $data;
});
