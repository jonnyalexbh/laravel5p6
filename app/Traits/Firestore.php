<?php

namespace App\Traits;

use Google\Cloud\Core\ServiceBuilder;

trait Firestore
{
    /**
     * initialize
     *
     */
    public function initialize()
    {
        $path = file_get_contents(base_path() . '/laravel5p6-229722-e63905cddaca.json');

        $cloud = new ServiceBuilder([
            'keyFile' => json_decode($path, true),
        ]);

        return $cloud->firestore();
    }
}
