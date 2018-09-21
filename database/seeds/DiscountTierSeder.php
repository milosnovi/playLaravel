<?php

use Illuminate\Database\Seeder;
use App\Models\DiscountTiers;

class DiscountTierSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discount_tiers')->insert([
            DiscountTiers::FIELD_VALUE => '10',
            DiscountTiers::CREATED_AT  => \Carbon\Carbon::now(),
            DiscountTiers::UPDATED_AT  => \Carbon\Carbon::now(),
        ]);

        DB::table('discount_tiers')->insert([
            DiscountTiers::FIELD_VALUE => '20',
            DiscountTiers::CREATED_AT  => \Carbon\Carbon::now(),
            DiscountTiers::UPDATED_AT  => \Carbon\Carbon::now(),
        ]);

        DB::table('discount_tiers')->insert([
            DiscountTiers::FIELD_VALUE => '25',
            DiscountTiers::CREATED_AT  => \Carbon\Carbon::now(),
            DiscountTiers::UPDATED_AT  => \Carbon\Carbon::now(),
        ]);
    }
}
