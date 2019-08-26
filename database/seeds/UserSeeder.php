<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'Admin Tester',
          'email' => 'admin@insive.com',
          'address' => '-',
          'password' => Hash::make('admininsive')
      ]);
      DB::table('users')->insert([
          'name' => 'Bariq Dharmawan',
          'email' => 'test@gmail.com',
          'email_verified_at' => '2019-08-26 13:28:52',
          'address' => 'Swadaya Gudang Baru, Jakarta Selatan',
          'password' => Hash::make('insive_member')
      ]);
    }
}
