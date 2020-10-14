<?php

use App\Models\ContactUs;
use Illuminate\Database\Seeder;

class MessageCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ContactUs::class, 25)->create()->each(function ($message) {
            $message->save();
        });
    }
}
