<?php

namespace App\Http\Controllers;

use App\Models\EnergyRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApirestController extends Controller
{
    public function getAreaStatus($id)
    {
        $areasst = DB::table('areas_st')->where('aeropuerto_id', $id)->get();
        return $areasst;
    }

    public function gethst($id)
    {
        $records = DB::table('energy_records')->where('area_id', $id)->orderBy('regtime', 'desc')->limit(15)->get();
        // $records = EnergyRecord::where('area_id', $id)->orderBy('regfecha', 'desc')->limit(15)->get();
        return $records;
    }
    public function getLst()
    {
        $register = EnergyRecord::orderBy('regtime', 'desc')->limit(1)->get();
        return $register;
    }
}
