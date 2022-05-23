<?php

namespace App\Exports;

use App\Models\EnergyRecord;
use Maatwebsite\Excel\Concerns\FromCollection;


class EnergyRecordsExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $arrayDetails;
    public function __construct($parameters)
    {
        $this->arrayDetails = $parameters;
    }
    public function collection()
    {
        //return EnergyRecord::where('id', 1)->get();
        return EnergyRecord::select($this->arrayDetails[0])->whereBetween('regtime', [$this->arrayDetails[1], $this->arrayDetails[2]])->where('area_id', $this->arrayDetails[3])->get();
    }
}
