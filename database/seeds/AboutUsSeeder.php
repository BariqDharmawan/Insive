<?php

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'instagram' => 'insive.id',
            'phone' => '+628111257596',
            'email' => 'yollamiranda@gmail.com',
            'embeded_map' => 'Jl. Swadaya gudang baru no. 15a'
        ]);
    }
}
