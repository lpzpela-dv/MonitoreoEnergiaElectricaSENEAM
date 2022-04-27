<?php

namespace App\Http\Controllers;

use App\Models\EnergyRecord;
use App\Models\NotificationEmail;
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
        // $records = DB::table('energy_records')->where('area_id', $id)->orderBy('regtime', 'desc')->limit(15)->get();
        $records = DB::table('energy_records')
            ->leftJoin('areas', 'energy_records.area_id', '=', 'areas.id')
            ->select('energy_records.*', 'areas.maxDiesel')
            ->where('energy_records.area_id', $id)
            ->orderBy('regtime', 'desc')
            ->limit(15)
            ->get();
        // $records = EnergyRecord::where('area_id', $id)->orderBy('regfecha', 'desc')->limit(15)->get();
        return $records;
    }
    public function getLst($area_id = 1)
    {
        $register = DB::table('energy_records')
            ->leftJoin('areas', 'energy_records.area_id', '=', 'areas.id')
            ->select('energy_records.*', 'areas.maxDiesel')
            ->where('energy_records.area_id', $area_id)
            ->orderBy('regtime', 'desc')
            ->limit(1)
            ->get();

        return $register;
    }
    public function getNofitEmails($notif_id)
    {
        $emails = NotificationEmail::find($notif_id);
        return $emails;
    }
}
