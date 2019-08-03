<?php

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
        DB::table('pricings')->insert([
            'price_name' => 'trial',
            'min_qty' => '1',
            'max_qty' => '2',
            'price' => '29900'
        ]);
        DB::table('pricings')->insert([
            'price_name' => 'medium',
            'min_qty' => '3',
            'max_qty' => '6',
            'price' => '25000'
        ]);
        DB::table('pricings')->insert([
            'price_name' => 'large',
            'min_qty' => '7',
            'max_qty' => '0',
            'type_price' => 'end',
            'price' => '22000'
        ]);
    }
}
    