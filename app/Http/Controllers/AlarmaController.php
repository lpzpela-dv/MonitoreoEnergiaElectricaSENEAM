<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AlarmaController extends Controller
{

    public function getViewAlarma()
    {
        $alarmas = DB::table('alarmasview')->get();
        return $alarmas;
    }
}
