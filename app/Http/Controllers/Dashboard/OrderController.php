<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

class OrderController extends Controller
{

    private $database;

    public function __construct()
    {
        $serviceAccount = storage_path('app/' . env('FIREBASE_CREDENTIALS'));
        $databaseUrl = env('FIREBASE_DATABASE_URL');

        $this->database = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->withDatabaseUri($databaseUrl)
            ->createDatabase();
    }




    public function index(){

        $test = $this->database->getReference('data');

            return $test->getValue();


//        $firebaseCredentials = config('firebase.credentials');
//        $firebaseUrl=  config('firebase.database');
//        $firebase = (new Factory)->withServiceAccount($firebaseCredentials)
//        ->withDatabaseUrl($firebaseUrl);
//
//        $database = $firebase->createDatabase();
//        $data = $database->getReferance('data');
//
//        return $data->getValue();

    }


    public function create()
    {
        return view('Dashboard.Order.create');
    }
}
