<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
      DB::table('users')->insert([
        'name' => 'Insive Admin',
        'email' => 'bariq.2nd.rodriguez@gmail.com', //yollamiranda@gmail.com
        'role' => 'admin',
        'email_verified_at' => Carbon::now(),
        'password' => Hash::make(12344321)
      ]);

      factory(User::class, 9)->create()->each(function ($user) {
        $user->save();
      });
    }
}
