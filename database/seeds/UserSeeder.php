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
          'role' => 'admin',
          'address' => '-',
          'email_verified_at' => date('Y-m-d H:i:s'),
          'password' => Hash::make('admininsive')
      ]);
      DB::table('users')->insert([
          'name' => 'Bariq Dharmawan',
          'role' => 'customer',
          'email' => 'test@gmail.com',
          'email_verified_at' => date('Y-m-d H:i:s'),
          'address' => 'Swadaya Gudang Baru, Jakarta Selatan',
          'password' => Hash::make('insive_member')
      ]);
    }
}
