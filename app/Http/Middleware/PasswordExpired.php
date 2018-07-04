<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class PasswordExpired
{
  /**
  * Handle an incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Closure  $next
  * @return mixed
  */
  public function handle($request, Closure $next)
  {
    $user = $request->user();
    $password_changed_at = new Carbon(($user->password_changed_at) ? $user->password_changed_at : $user->created_at);

    if (Carbon::now()->diffInDays($password_changed_at) >= config('auth.password_expires_days')) {
      return redirect()->route('password.expired');
    }

    return $next($request);
  }
}
