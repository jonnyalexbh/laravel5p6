<?php

namespace App\Http\Controllers\Api\Auth;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginSimpleController extends Controller
{
  /**
  * register
  *
  */
  public function register(Request $request)
  {
    $validate = $request->validate([
      'name' => 'required',
      'gender_id' => 'required|numeric',
      'email' => 'required|email|unique:users',
      'phone' => 'required|numeric'
    ]);

    $input = $request->all();
    $input['name'] = $input['name'];
    $input['password'] = bcrypt('secret');
    $input['is_active'] = 0;

    $user = User::create($input);
    $token =  $user->createToken('MyApp')->accessToken;
    return response()->json(['user' => $user, 'token' => $token], 200);
  }
  /**
  * login
  *
  */
  public function login(Request $request)
  {
    $validate = $request->validate([
      'email' => 'required',
      'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $user = Auth::user();
      $token =  $user->createToken('MyApp')->accessToken;
      return response()->json(['token' => $token], 200);
    }
    else {
      return response()->json(['error' => 'Unauthorised'], 401);
    }
  }
  /**
  * profile
  *
  */
  public function profile()
  {
    $user = Auth::user();
    return response()->json(['data' => $user], 200);
  }
  /**
  * logout
  *
  */
  public function logout()
  {
    $accessToken = Auth::user()->token();
    $accessToken->revoke();
    return response()->json(['success' => $accessToken], 200);
  }
}
