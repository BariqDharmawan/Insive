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
        $this->call(QuestionSeeder::class);
        $this->call(OptionSeeder::class);
        $this->call(LogicSeeder::class);
        $this->call(SheetSeeder::class);
        $this->call(FragranceSeeder::class);
        $this->call(PriceSeeder::class);
    }
}
