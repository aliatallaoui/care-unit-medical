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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = Service::all();
        $servicesRDV = Service::pluck('name', 'id')->all();

        return view('home',compact('services','servicesRDV'));
    }
}

