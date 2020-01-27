<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $servicesActive = $this->loadServices(0);


        return view('home', compact('servicesActive'));
    }

    private function loadServices($isDone){
        if($isDone == 0){
            $services = Service::where('isDone', 0)->with('customer')->orderBy('id', 'desc')->paginate(20);

            return $services;
        }

        $services = Service::where('isDone', 1)->with('customer')->orderBy('id', 'desc')->paginate(20);

        return $services;
    }
}
