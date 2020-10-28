<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'nome'          => $faker->unique()->word,
        'marca'   => $faker->sentence(),
        'preco'   => $faker->floatval(),
        'estoque'   => $faker->intval(),
    ];
});
