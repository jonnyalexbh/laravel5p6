<?php

namespace App\Http\Controllers;

use Google\Cloud\Core\ServiceBuilder;
use Storage;

class FirestoreController extends Controller
{
    /**
     * shortcuts
     *
     */
    public function shortcuts()
    {
        $path = Storage::get('laravel5p6-229722-e63905cddaca.json');

        $cloud = new ServiceBuilder([
            'keyFile' => json_decode($path, true),
        ]);

        $this->firestore = $cloud->firestore();

        $shortcuts = $this->firestore
            ->collection("countries")
            ->document('ar')
            ->collection("profiles")
            ->document('CN')
            ->snapshot()
            ->data();

        dd($shortcuts);
    }
}
