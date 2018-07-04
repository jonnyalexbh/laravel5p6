<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class UserController extends ApiController
{
  /**
  * index
  *
  */
  public function index()
  {
    $users = User::with('gender', 'marital_status')->get();
    return response()->json(['data' => $users], 200);
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
    //
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
