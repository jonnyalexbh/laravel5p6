<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\MaritalStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Requests\MaritalStatusRequest;

class MaritalStatusController extends ApiController
{
  /**
  * index
  *
  */
  public function index()
  {
    $marital_statuses = MaritalStatus::with('users')->get();
    return $this->showAll($marital_statuses);
  }
  /**
  * store
  *
  */
  public function store(MaritalStatusRequest $request)
  {
    $marital_status = MaritalStatus::create($request->all());
    return $this->showOne($marital_status, 201);
  }
  /**
  * show
  *
  */
  public function show($id)
  {
    $marital_status = MaritalStatus::findOrFail($id);
    return $this->showOne($marital_status);
  }
  /**
  * update
  *
  */
  public function update(Request $request, MaritalStatus $marital_status)
  {
    $fields = $request->all();

    $validator = Validator::make($fields, [
      'name' => 'required'
    ]);

    if($validator->fails()){
      return $this->validationErrors('required fields', $validator->messages());
    }

    if ($request->has('name')) {
      $marital_status->name = $request->name;
    }

    if (!$marital_status->isDirty()) {
      return $this->errorResponse('You need to specify a different value to update', 422);
    }

    $marital_status->save();
    return $this->showOne($marital_status);
  }
  /**
  * destroy
  *
  */
  public function destroy($id)
  {
    $marital_status = MaritalStatus::findOrFail($id);
    $marital_status->delete();
    return $this->showOne($marital_status);
  }
}
