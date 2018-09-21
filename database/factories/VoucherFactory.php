<?php

use Faker\Generator as Faker;
use App\Models\DiscountTiers;
use App\Models\Voucher;

$discountTiers = DiscountTiers::all()->pluck('id')->toArray();

$factory->define(Voucher::class, function (Faker $faker) use($discountTiers) {
    return [
        Voucher::FIELD_START_DATE           => $faker->dateTimeBetween('-1years', '+1 year'),
        Voucher::FIELD_END_DATE             => $faker->dateTimeBetween('-1years', '+1 year'),
        Voucher::FIELD_DISCOUNT_TIERS_ID    => $faker->randomElement($discountTiers),
        Voucher::CREATED_AT        => \Carbon\Carbon::now(),
        Voucher::UPDATED_AT        => \Carbon\Carbon::now(),
    ];
});
