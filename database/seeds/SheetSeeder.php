<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SheetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sheet_name = [
            'Coconut bio-cellulose',
            'Activated charcoal',
            'Super silk',
            'Panda animal printed',
            'Sheep animal printed'
        ];
        $sheet_img = [
            'coconut-bio-cellulose.png',
            'activated-charcoal.png',
            'activated-charcoal.png',
            'activated-charcoal.png',
            'activated-charcoal.png'
        ];
        $prices = [29000, 30000, 25000, 45000, 16000, 27500];

        foreach ($sheet_name as $key => $value) {
            DB::table('sheet')->insert([
                'sheet_name' => $value,
                'sheet_img' => $sheet_img[$key],
                'is_available' => false,
                'price' => $prices[rand(0, count($prices) - 1)]
            ]);
        }
    }
}
