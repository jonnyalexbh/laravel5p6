<?php

namespace App\Http\Controllers\Auth;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }
  /**
  * authenticated
  *
  */
  function authenticated(Request $request, $user)
  {
    if($user->session_id) {
      Session::getHandler()->destroy($user->session_id);
    }

    $user->update([
      'last_login_at' => Carbon::now()->toDateTimeString(),
      'last_login_ip' => $request->getClientIp(),
      'session_id' => session()->getId()
    ]);

    return redirect()->intended($this->redirectPath());
  }
}
