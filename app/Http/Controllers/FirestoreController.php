<?php

namespace App\Http\Controllers;

use App\Traits\Firestore;

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
}
