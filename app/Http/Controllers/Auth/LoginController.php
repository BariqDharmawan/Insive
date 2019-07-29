<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;

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
    protected $redirectTo = '/home';

    public function redirectToProvider($provider)
    {
      return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {

      $userSocial = Socialite::driver($provider)->user();
      $users = User::firstOrCreate(
        ['email'           => $userSocial->getEmail()],
        ['name'            => $userSocial->getName()],
        ['provider_token'  => $userSocial->token],
        ['email'           => $userSocial->getEmail()],
        ['image'           => $userSocial->getAvatar()],
        ['provider_id'     => $userSocial->getId()],
        ['provider'        => $provider]
      );

      Auth::login($users);
      return redirect('home');

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
