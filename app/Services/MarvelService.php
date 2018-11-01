<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class MarvelService
{
    use ConsumesExternalService;

    /**
     * The base uri, privateKey, publicKey to consume the comics service
     *
     */
    public $baseUri;
    public $privateKey;
    public $publicKey;

    /**
     * __construct
     *
     */
    public function __construct()
    {
        $this->baseUri = config('services.marvel.base_uri');
        $this->privateKey = config('services.marvel.private_key');
        $this->publicKey = config('services.marvel.public_key');
    }

    /**
     * obtain the full list of comics from the marvel service
     *
     */
    public function obtainComics()
    {
        $ts = date('c');
        $hash = md5($ts . $this->privateKey . $this->publicKey);
        return $this->performRequest('GET', 'v1/public/comics?ts=' . $ts . '&apikey=' . $this->publicKey . '&hash=' . $hash . '');
    }
}
