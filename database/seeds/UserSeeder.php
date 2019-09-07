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
          'name' => 'Insive Admin',
          'email' => 'yollamiranda@gmail.com',
          'role' => 'admin',
          'phone' => '08111257596',
          'email_verified_at' => date('Y-m-d H:i:s'),
          'address' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31722.66662382847!2d106.80605039999996!3d-6.350872700000011!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ee81751243dd%3A0x34aadb73e9f86bf2!2sJl.+Swadaya+Gudang+Baru+No.15+A%2C+RT.5%2FRW.4%2C+Ciganjur%2C+Kec.+Jagakarsa%2C+Kota+Jakarta+Selatan%2C+Daerah+Khusus+Ibukota+Jakarta+12630!5e0!3m2!1sen!2sid!4v1564569578385!5m2!1sen!2sid" width="600" height="270" frameborder="0" style="border:0" allowfullscreen></iframe>',
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
      DB::table('users')->insert([
        'name' => 'Bariq Dharmawan',
        'role' => 'customer',
        'email' => 'sanchez77rodriguez@gmail.com',
        'phone' => '087776196047',
        'email_verified_at' => date('Y-m-d H:i:s'),
        'address' => 'Swadaya Gudang Baru, Jakarta Selatan',
        'password' => Hash::make('insive_member')
      ]);
    }
}
