<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
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

        return view('Dashboard.Order.index',[
            'orders' => Order::latest()->get()
        ]);


//        $test = $this->database->getReference('data');
//        return $test->getValue();
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

    public function show($id)
    {
        return view('Dashboard.Order.show',[
            'order' => Order::findOrFail($id),

        ]);
    }
    public function update($id)
    {
        $order = Order::findOrfail($id);
        if($order->status == 'Prepare'){
            $order->update(['status'=>'delivery']);
        }
        return redirect()->back();

    }
}
