<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordExpiredRequest;

class ExpiredPasswordController extends Controller
{
  /**
  * expired
  *
  */
  public function expired()
  {
    return view('auth.passwords.expired');
  }
  /**
  * postExpired
  *
  */
  public function postExpired(PasswordExpiredRequest $request)
  {
    // Checking current password
    if (!Hash::check($request->current_password, $request->user()->password)) {
      return redirect()->back()->withErrors(['current_password' => 'Current password is not correct']);
    }

    $request->user()->update([
      'password' => bcrypt($request->password),
      'password_changed_at' => Carbon::now()->toDateTimeString()
    ]);
    return redirect()->back()->with(['status' => 'Password changed successfully']);
  }
}
