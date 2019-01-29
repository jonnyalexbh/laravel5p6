<?php

namespace App\Traits;

use Google\Cloud\Core\ServiceBuilder;
use Storage;

trait Firestore
{
    /**
     * initialize
     *
     */
    public function initialize()
    {
        $path = Storage::get('laravel5p6-229722-e63905cddaca.json');

        $cloud = new ServiceBuilder([
            'keyFile' => json_decode($path, true),
        ]);

        return $cloud->firestore();
    }
}
