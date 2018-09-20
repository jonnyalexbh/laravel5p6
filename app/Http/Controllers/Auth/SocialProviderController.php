<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Socialite;
use App\SocialProvider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialProviderController extends Controller
{
  /**
  * redirectToProvider
  *
  */
  public function redirectToProvider($provider)
  {
    return Socialite::driver($provider)->redirect();
  }
  /**
  * handleProviderCallback
  *
  */
  public function handleProviderCallback($provider)
  {
    try {
      $socialiteUser = Socialite::driver($provider)->user();
    } catch (Exception $e) {
      return redirect('/');
    }
    // check if that user already exists in the DB
    $findUser = SocialProvider::where('provider_id', $socialiteUser->getId())->first();

    if ($findUser) {
      $user = $findUser->user;
    }
    // otherwise create a new user
    else {
      $user = User::firstOrCreate([
        'email' => $socialiteUser->getEmail()
      ], [
        'name' => $socialiteUser->getName(),
        'password' => bcrypt('secret'),
        'gender_id' => \App\Gender::all()->random()->id,
        'phone' => 2222222,
      ]);
      $user->socialProviders()->create([
        'provider_id' => $socialiteUser->getId(),
        'provider' => $provider
      ]);
    }
    return $this->authAndRedirect($user);
  }
  /**
  * login and redirection
  *
  */
  public function authAndRedirect($user)
  {
    Auth::login($user);
    return redirect('home');
  }
}
