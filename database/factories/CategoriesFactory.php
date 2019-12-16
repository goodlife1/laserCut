<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->text(15),
        'description'=>$faker->text('25'),
        'image_id'=>$faker->numberBetween(1,100),
        'product_count'=>$faker->numberBetween(10,150)
    ];
});
