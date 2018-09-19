<?php

namespace App\Http\Controllers\Auth;

use Socialite;
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
    $user = Socialite::driver($provider)->user();
    dd($user);
  }
}
