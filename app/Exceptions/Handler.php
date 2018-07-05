<?php

namespace App\Exceptions;

use Exception;
use App\Traits\ApiResponser;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
  use ApiResponser;

  /**
  * A list of the exception types that are not reported.
  *
  * @var array
  */
  protected $dontReport = [
    //
  ];

  /**
  * A list of the inputs that are never flashed for validation exceptions.
  *
  * @var array
  */
  protected $dontFlash = [
    'password',
    'password_confirmation',
  ];

  /**
  * Report or log an exception.
  *
  * @param  \Exception  $exception
  * @return void
  */
  public function report(Exception $exception)
  {
    parent::report($exception);
  }

  /**
  * Render an exception into an HTTP response.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Exception  $exception
  * @return \Illuminate\Http\Response
  */
  public function render($request, Exception $exception)
  {
    // the request contains a type (GET, PUT, POST etc) that is not used in this API
    if ($exception instanceof MethodNotAllowedHttpException) {
      return $this->errorResponse('The specified method for the request is invalid', 405);
    }

    // basically an invalid path in the request
    if ($exception instanceof NotFoundHttpException) {
      return $this->errorResponse('The specified URL cannot be found', 404);
    }

    // QueryException
    if ($exception instanceof QueryException) {
      $errorCode = $exception->errorInfo[1];
      if ($errorCode == 1451) {
        return $this->errorResponse('Cannot remove this resource permanently as it is related with another resource', 409);
      }
    }

    return parent::render($request, $exception);
  }
}
