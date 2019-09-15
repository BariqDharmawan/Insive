<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

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
      if (Auth::user()->role == 'admin') {
        return 'admin/dashboard';
      }
      else {
        if (Auth::user()->email_verified_at == '') {
          return 'home';
        }
        else {
          return '/';
        }
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
        ['email'           => $userSocial->getEmail()],
        ['name'            => $userSocial->getName()]
      );
      Auth::login($users);
      if (Auth::user()->email_verified_at == '') {
        return redirect('home');
      }
      else {
        return redirect('/');
      }
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
