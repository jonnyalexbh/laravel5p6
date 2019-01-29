<?php

namespace App\Http\Controllers;

use App\Traits\Firestore;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirestoreController extends Controller
{
    use Firestore;

    /**
     * shortcuts
     *
     */
    public function shortcuts()
    {
        $firestore = $this->initialize();

        $shortcuts = $firestore
            ->collection("countries")
            ->document('ar')
            ->collection("profiles")
            ->document('CN')
            ->snapshot()
            ->data();

        dd($shortcuts);
    }

    /**
     * remoteConfig
     *
     */
    public function remoteConfig()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(base_path('laravel5p6-229722-e63905cddaca.json'));

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $remoteConfig = $firebase->getRemoteConfig();

        $template = $remoteConfig->get();
        echo json_encode($template, JSON_PRETTY_PRINT);
    }
}
