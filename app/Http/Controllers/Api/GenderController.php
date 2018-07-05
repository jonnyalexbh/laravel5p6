<?php

namespace App\Http\Controllers\Api;

use App\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class GenderController extends ApiController
{
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
  public function store(Request $request)
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
    $gender = Gender::findOrFail($id);
    return response()->json(['data' => $gender], 200);
  }
  /**
  * update
  *
  */
  public function update(Request $request, $id)
  {
    $gender = Gender::findOrFail($id);

    if ($request->has('name')) {
      $gender->name = $request->name;
    }

    if (!$gender->isDirty()) {
      return response()->json(['error' => 'You need to specify a different value to update', 'code' => 422], 422);
    }

    $gender->save();
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
