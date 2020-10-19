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
        $qty = 1;

        foreach ($fragrance_name as $key => $value) {
            DB::table('fragrances')->insert([
                'fragrance_name' => $value,
                'fragrance_img' => $fragrance_img[$key],
                'qty' => $qty
            ]);
        }
    }
}
