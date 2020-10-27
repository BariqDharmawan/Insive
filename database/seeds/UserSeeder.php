<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'name' => 'Insive Admin',
      'email' => 'yollamiranda@gmail.com', //yollamiranda@gmail.com
      'role' => 'admin',
      'email_verified_at' => now(),
      'password' => Hash::make(12344321)
    ]);

    factory(User::class, 9)->create()->each(function ($user) {
      $user->save();
    });
  }
}
