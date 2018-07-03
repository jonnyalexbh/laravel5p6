<?php

namespace App\Http\Controllers\Api;

use App\Gender;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenderController extends Controller
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
  * create
  *
  */
  public function create()
  {
    //
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
    //
  }

  /**
  * edit
  *
  */
  public function edit($id)
  {
    //
  }

  /**
  * update
  *
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * destroy
  *
  */
  public function destroy($id)
  {
    //
  }
}
