<?php

namespace App\Http\Controllers;

use App\Models\Aeropuerto;
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
    public function index($area_id)
    {
        $aeropuertos = Aeropuerto::all();
        return view('dashboardMultiPlantas', compact('aeropuertos'));
    }
}
