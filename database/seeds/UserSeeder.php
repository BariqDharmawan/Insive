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
          'role' => 'admin',
          'password' => Hash::make('admininsive')
      ]);
      DB::table('users')->insert([
          'name' => 'Bariq Dharmawan',
          'email' => 'sanchez77rodriguez@gmail.com',
          'address' => 'Swadaya Gudang Baru, Jakarta Selatan',
          'password' => Hash::make('insive_member')
      ]);
    }
}
