<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FragranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fragrance_name = ['Rose', 'Strawberry', 'Coffe', 'Unscented'];
        $fragrance_img = ['rose3.png', 'strawberry.png', 'coffee.png', 'Unscented.png'];
        $prices = [29000, 30000, 25000, 45000, 16000, 27500];

        foreach ($fragrance_name as $key => $value) {
            DB::table('fragrance')->insert([
                'fragrance_name' => $value,
                'fragrance_img' => $fragrance_img[$key],
                'is_available' => true,
                'price' => $prices[rand(0, count($prices) - 1)]
            ]);
        }
    }
}
