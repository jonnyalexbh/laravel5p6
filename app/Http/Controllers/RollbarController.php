<?php

namespace App\Http\Controllers;

class RollbarController extends Controller
{
    /**
     * basic
     *
     */
    public function basic()
    {
        \Log::debug('testing rollbar');
    }

    /**
     * withData
     *
     */
    public function withData()
    {
        \Log::error('Something went wrong', ['person' => ['id' => (string) 70518765, 'username' => 'jonnyalexbh', 'email' => 'jonnyalex@doe.com']]);
    }
}
