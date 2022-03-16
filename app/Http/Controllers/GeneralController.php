<?php

namespace App\Http\Controllers;

use App\Models\Aeropuerto;
use App\Models\Area;
use Illuminate\Http\Request;

class GeneralController extends Controller
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
        $aeropuertos = Aeropuerto::all();
        return view('dashboardGeneral', compact('aeropuertos'));
    }
}
