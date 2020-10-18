<?php

use Illuminate\Database\Seeder;

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
        $qty = 1;

        foreach ($sheet_name as $key => $value) {
            DB::table('sheets')->insert([
                'sheet_name' => $value,
                'sheet_img' => $sheet_img[$key],
                'qty' => $qty
            ]);
        }
    }
}
