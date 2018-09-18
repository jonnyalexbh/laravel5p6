<?php

namespace App\Http\Controllers\Api;

use App\Gender;
use Illuminate\Http\Request;
use App\Http\Requests\GenderRequest;
use App\Http\Controllers\ApiController;

class GenderController extends ApiController
{
  /**
  * __construct
  *
  */
  public function __construct()
  {
    $this->middleware('auth:api');
    $this->middleware('scope:transaction-gender')->only('store', 'update', 'destroy');
    $this->middleware('scope:consult-gender')->except('store', 'update', 'destroy');
  }
  /**
  * index
  *
  */
  public function index()
  {
    $genders = Gender::with('users')->get();
    return response()->json(['data' => $genders], 200);
  }
  /**
  * store
  *
  */
  public function store(GenderRequest $request)
  {
    $gender = Gender::create($request->all());
    return response()->json(['data' => $gender], 201);
  }
  /**
  * show
  *
  */
  public function show($id)
  {
    $gender = Gender::find($id);
    return response()->json(['data' => $gender], 200);
  }
  /**
  * update
  *
  */
  public function update(Request $request, Gender $gender)
  {
    $gender->update($request->all());
    return response()->json(['data' => $gender], 200);
  }
  /**
  * destroy
  *
  */
  public function destroy($id)
  {
    $gender = Gender::destroy($id);
    return response()->json(['data' => $gender], 200);
  }
}
