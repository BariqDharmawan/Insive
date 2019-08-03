<?php

use Illuminate\Database\Seeder;

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
        $fragrance_img = 'frg_people.png';
        $qty = 10;

        foreach ($fragrance_name as $key => $value) {
            DB::table('fragrances')->insert([
                'fragrance_name' => $value,
                'fragrance_img' => $fragrance_img,
                'qty' => $qty
            ]);
        }
    }
}
