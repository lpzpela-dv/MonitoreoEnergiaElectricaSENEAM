<?php

namespace App\Exports;

use App\Models\EnergyRecord;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;


class EnergyRecordsExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $arrayDetails;
    public function __construct($parameters)
    {
        $this->arrayDetails = $parameters;
    }
    public function view(): View
    {
        if ($this->arrayDetails[4] == 1) {
            $results = EnergyRecord::select($this->arrayDetails[0])->whereBetween('regtime', [$this->arrayDetails[1], $this->arrayDetails[2]])->where('area_id', $this->arrayDetails[3])->get();
            return view('/reports/energyReport', compact('results'));
        } else {
            if ($this->arrayDetails[4] == 2) {
                $results = DB::select("CALL GetDieselReport('" . $this->arrayDetails[0] . "','" . $this->arrayDetails[1] . "'," . $this->arrayDetails[2] . ")");
                return view('/reports/dieselReport', compact('results'));
            }
        }
    }
}
