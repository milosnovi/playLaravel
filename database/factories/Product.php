<?php

use Faker\Generator as Faker;
use App\Models\Product;


$factory->define(\App\Models\Product::class, function (Faker $faker) {
    return [
        Product::FIELD_NAME => $faker->name,
        Product::FIELD_PRICE => $faker->numberBetween(10,10000),
        Product::CREATED_AT  => \Carbon\Carbon::now(),
        Product::UPDATED_AT  => \Carbon\Carbon::now(),
    ];
});
