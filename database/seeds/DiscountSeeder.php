<?php

use App\Models\ProductDiscount;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductDiscount::class, 10)->create()->each(function ($disc) {
            $disc->save();
        });
    }
}
