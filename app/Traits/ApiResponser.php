<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait ApiResponser
{
  /**
  * successResponse
  *
  */
  private function successResponse($data, $code)
  {
    return response()->json($data, $code);
  }
  /**
  * errorResponse
  *
  */
  protected function errorResponse($message, $code)
  {
    return response()->json(['error' => $message, 'code' => $code], $code);
  }
  /**
  * showAll
  *
  */
  protected function showAll(Collection $collection, $code = 200)
  {
    return $this->successResponse(['data' => $collection], $code);
  }
  /**
  * showOne
  *
  */
  protected function showOne(Model $instance, $code = 200)
  {
    return $this->successResponse(['data' => $instance], $code);
  }
  /**
  * validationErrors
  *
  */
  public function validationErrors($error, $errorMessages = [], $code = 422)
  {
    $response = [
      'error' => $error
    ];

    foreach ($errorMessages->messages() as $key => $value) {
      $errors[] = 'the field ' .$key. ' is empty';
    }

    if(!empty($errorMessages)){
      $response['data'] = $errors;
    }

    return response()->json($response, $code);
  }

}
