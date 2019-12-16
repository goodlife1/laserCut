<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->text(26),
        'description'=>$faker->text,
        'wholesale_price'=>$faker->numberBetween(15,250),
        'wholesale_min_count'=>50,
        'discount'=>$faker->numberBetween(0,16),
        'price'=>$faker->numberBetween(20,250),
        'proprieties'=> json_encode([
            'main'=>'main'
        ])

    ];
});
