<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          QuestionSeeder::class,
          OptionSeeder::class,
          LogicSeeder::class,
          SheetSeeder::class,
          FragranceSeeder::class,
          PriceSeeder::class,
          UserSeeder::class
        ]);
    }
}
