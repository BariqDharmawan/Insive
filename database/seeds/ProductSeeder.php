<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
          [
            'product_name' => 'product first',
            'price' => '20000',
            'qty' => '29',
            'type' => 'A',
            'category' => 'mask',
            'created_at' => Carbon::now()
          ],
          [
            'product_name' => 'product second',
            'price' => '30000',
            'qty' => '39',
            'type' => 'C',
            'category' => 'mask',
            'created_at' => Carbon::now()
          ],
          [
            'product_name' => 'product third',
            'price' => '70000',
            'qty' => '9',
            'type' => 'C',
            'category' => 'mask',
            'created_at' => Carbon::now()
          ],
          [
            'product_name' => 'product fourth',
            'price' => '50000',
            'qty' => '19',
            'type' => 'A',
            'category' => 'mask',
            'created_at' => Carbon::now()
          ],
          [
            'product_name' => 'product fifth',
            'price' => '90000',
            'qty' => '29',
            'type' => 'A',
            'category' => 'mask',
            'created_at' => Carbon::now()
          ],
          [
            'product_name' => 'product sixth',
            'price' => '20000',
            'qty' => '69',
            'type' => 'A',
            'category' => 'mask',
            'created_at' => Carbon::now()
          ],
          [
            'product_name' => 'product seventh',
            'price' => '30000',
            'qty' => '59',
            'type' => 'C',
            'category' => 'mask',
            'created_at' => Carbon::now()
          ],
          [
            'product_name' => 'product eighth',
            'price' => '70000',
            'qty' => '99',
            'type' => 'C',
            'category' => 'mask',
            'created_at' => Carbon::now()
          ],
          [
            'product_name' => 'product ninth',
            'price' => '50000',
            'qty' => '129',
            'type' => 'B',
            'category' => 'mask',
            'created_at' => Carbon::now()
          ],
          [
            'product_name' => 'product tenth',
            'price' => '90000',
            'qty' => '69',
            'type' => 'B',
            'category' => 'mask',
            'created_at' => Carbon::now()
          ]
        ]);
    }
}
