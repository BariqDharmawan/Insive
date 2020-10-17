<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo()
    {
      switch(auth()->user()->role) {
        case 'admin':
          return 'admin/dashboard';
        break;

        case 'customer':
          if (auth()->user()->email_verified_at == '') { //if user not verified
            return 'home';
          } 
          else {
            return '/';
          }
        break;
      }

    }

    public function redirectToProvider($provider)
    {
      return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
      $userSocial = Socialite::driver($provider)->user();
      $users = User::firstOrCreate(
        ['email' => $userSocial->getEmail()],
        [
          'name' => $userSocial->getName(),
          'image' => $userSocial->getAvatar(),
          'provider' => 'socialite',
          'email_verified_at' => now()
        ]
      );

      Auth::login($users);
      return redirect()->intended('/');
      
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
