<?php

use App\Models\Pricing;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pricing::insert([
            [
                'price_name' => 'trial',
                'min_qty' => 1,
                'max_qty' => 2,
                'price' => 29900,
                'type_price' => 'normal',
            ],
            [
                'price_name' => 'medium',
                'min_qty' => 3,
                'max_qty' => 6,
                'price' => 25000,
                'type_price' => 'normal',
            ],
            [
                'price_name' => 'large',
                'min_qty' => 7,
                'max_qty' => 0,
                'price' => 22000,
                'type_price' => 'end',
            ]
        ]);
    }
}
