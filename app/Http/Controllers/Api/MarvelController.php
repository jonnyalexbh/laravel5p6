<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Services\MarvelService;

class MarvelController extends ApiController
{
    /**
     * The service to consume the marvel service
     *
     */
    public $comicsService;

    /**
     * __construct
     *
     */

    public function __construct(MarvelService $comicsService)
    {
        $this->comicsService = $comicsService;
    }
    
    /**
     * The service to consume the comics service
     *
     */
    public function index()
    {
        $comics = $this->comicsService->obtainComics();
        return response($comics, 200)->header('Content-Type', 'application/json');
    }
}
