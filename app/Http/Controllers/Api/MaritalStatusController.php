<?php

namespace App\Http\Controllers\Api;

use App\MaritalStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class MaritalStatusController extends ApiController
{
  /**
  * index
  *
  */
  public function index()
  {
    $marital_statuses =  MaritalStatus::with('users')->get();
    return $this->showAll($marital_statuses);
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
