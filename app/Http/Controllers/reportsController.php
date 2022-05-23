<?php

namespace App\Http\Controllers;

use App\Exports\EnergyRecordsExport;
use App\Models\Aeropuerto;
use App\Models\Area;
use App\Models\EnergyRecord;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class reportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public $camposGeneral = array(
        [
            ['id', 'VoltL1 AS d1', 'VoltL2 AS d2', 'VoltL3 AS d3', 'regtime AS fecha'], // CFE Volt
            ['id', 'AmpL1 AS d1', 'AmpL2 AS d2', 'AmpL3 AS d3', 'regtime AS fecha'], // CFE Amp
            ['id', 'WattsL1 AS d1', 'WattsL2 AS d2', 'WattsL3 AS d3', 'regtime AS fecha'], // CFE Watts
            ['id', 'KwHL1 AS d1', 'KwHL2 AS d2', 'KwHL3 AS d3', 'regtime AS fecha'], // CFE Kw/h
            ['id', 'FpL1 AS d1', 'FpL2 AS d2', 'FpL3 AS d3', 'regtime AS fecha'], // CFE FP
            ['id', 'HzL1 AS d1', 'HzL2 AS d2', 'HzL3 AS d3', 'regtime AS fecha'], // CFE Hz
        ],
        [
            ['id', 'VoltL4 AS d1', 'VoltL5 AS d2', 'VoltL6 AS d3', 'regtime AS fecha'], // Planta Volt
            ['id', 'AmpL4 AS d1', 'AmpL5 AS d2', 'AmpL6 AS d3', 'regtime AS fecha'], // Planta Amp
            ['id', 'WattsL4 AS d1', 'WattsL5 AS d2', 'WattsL6 AS d3', 'regtime AS fecha'], // Planta Watts
            ['id', 'KwHL4 AS d1', 'KwHL5 AS d2', 'KwHL6 AS d3', 'regtime AS fecha'], // Planta Kw/h
            ['id', 'FpL4 AS d1', 'FpL5 AS d2', 'FpL6 AS d3', 'regtime AS fecha'], // Planta FP
            ['id', 'HzL4 AS d1', 'HzL5 AS d2', 'HzL6 AS d3', 'regtime AS fecha'], // Planta Hz
        ],
        [
            ['id', 'VoltL7 AS d1', 'VoltL8 AS d2', 'VoltL9 AS d3', 'regtime AS fecha'], // Carga Volt
            ['id', 'AmpL7 AS d1', 'AmpL8 AS d2', 'AmpL9 AS d3', 'regtime AS fecha'], // Carga Amp
            ['id', 'WattsL7 AS d1', 'WattsL8 AS d2', 'WattsL9 AS d3', 'regtime AS fecha'], // Carga Watts
            ['id', 'KwHL7 AS d1', 'KwHL8 AS d2', 'KwHL9 AS d3', 'regtime AS fecha'], // Carga Kw/h
            ['id', 'FpL7 AS d1', 'FpL8 AS d2', 'FpL9 AS d3', 'regtime AS fecha'], // Carga FP
            ['id', 'HzL7 AS d1', 'HzL8 AS d2', 'HzL9 AS d3', 'regtime AS fecha'], // Carga Hz
        ]
    );
    public $fuentes = array(
        ['id' => '0', 'desc' => 'CFE'],
        ['id' => '1', 'desc' => 'Planta'],
        ['id' => '2', 'desc' => 'Carga'],

    );
    public $tdatos = array(
        ['id' => '0', 'desc' => 'Volt'],
        ['id' => '1', 'desc' => 'Amp'],
        ['id' => '2', 'desc' => 'Watts'],
        ['id' => '3', 'desc' => 'Kw/h'],
        ['id' => '4', 'desc' => 'FP'],
        ['id' => '5', 'desc' => 'Hz'],
    );
    public $headerTitleF = array(
        ['CFE'], ['Planta'], ['Carga']
    );
    public $headerTitleD = array(
        ['Voltaje'], ['Amperaje'], ['Watts'], ['Kw/h'], ['Factor de potencia'], ['Hertz']
    );
    public function getEnergyReportView()
    {
        $aeroID = $_COOKIE['id_aero_selected'];
        $areas = Area::all()->where('aeropuerto_id', $aeroID);
        $aeropuertos  = Aeropuerto::all();
        $saveDate = '';
        $histFilter = ['', '', ''];
        $fuentes = $this->fuentes;
        $tdatos = $this->tdatos;
        $headerTitleF = $this->headerTitleF;
        $headerTitleD = $this->headerTitleD;
        // $campos = ['id', 'VoltL1 AS d1', 'VoltL2 AS d2', 'VoltL3 AS d3', 'regtime AS fecha'];
        // $datos = EnergyRecord::select($campos)->whereBetween('regtime', ['2022-04-03 00:00:00', '2022-04-03 22:42:50'])->paginate(20);
        $datos = '';
        return view('historyenergy', compact('aeropuertos', 'datos', 'saveDate', 'areas', 'histFilter', 'fuentes', 'tdatos', 'headerTitleF', 'headerTitleD'));
    }
    public function filterEnergyData(Request $request)
    {
        $aeroID = $_COOKIE['id_aero_selected'];
        $saveDate = '';
        $histFilter = ['', '', ''];
        $fuentes = $this->fuentes;
        $tdatos = $this->tdatos;
        $headerTitleF = $this->headerTitleF;
        $headerTitleD = $this->headerTitleD;
        $areas = Area::all()->where('aeropuerto_id', $aeroID);
        $aeropuertos  = Aeropuerto::all();
        if (isset($request['fuenteID'])) {
            setcookie('cfuenteID', $request['fuenteID']);
            setcookie('cdatoID', $request['datoID']);
            setcookie('careaID', $request['areaID']);
            setcookie('csaveDate', $request['dateRange']);
            $saveDate = $request['dateRange'];
            $rFecha = $this->formatDate($request['dateRange']);
        } else {
            $saveDate = $_COOKIE['csaveDate'];
        }
        if (isset($request['areaID'])) {
            $histFilter = [$request['areaID'], $request['fuenteID'], $request['datoID']];
        } else {
            $histFilter = [$_COOKIE['careaID'], $_COOKIE['cfuenteID'], $_COOKIE['cdatoID']];
        }
        // return $rFecha;
        // $datos = EnergyRecord::select('id', 'VoltL1 AS d1', 'VoltL2 AS d2', 'VoltL3 AS d3', 'regtime AS fecha')->whereBetween('regtime', [$rFecha[0], $rFecha[1]])->paginate(20);
        // return $this->camposGeneral[$request['fuenteID']][$request['datoID']];
        if (isset($request['fuenteID'])) {

            $datos = EnergyRecord::select($this->camposGeneral[$request['fuenteID']][$request['datoID']])->whereBetween('regtime', [$rFecha[0], $rFecha[1]])->where('area_id', $request['areaID'])->paginate(20);
            return view('historyenergy', compact('aeropuertos', 'datos', 'saveDate', 'areas', 'histFilter', 'fuentes', 'tdatos', 'headerTitleF', 'headerTitleD'));
        } else {
            $datos = EnergyRecord::select($this->camposGeneral[$_COOKIE['cfuenteID']][$_COOKIE['cdatoID']])->whereBetween('regtime', [$_COOKIE['cfechaI'], $_COOKIE['cfechaF']])->where('area_id', $_COOKIE['careaID'])->paginate(20);
            return view('historyenergy', compact('aeropuertos', 'datos', 'saveDate', 'areas', 'histFilter', 'fuentes', 'tdatos', 'headerTitleF', 'headerTitleD'));
        }
    }
    private function formatDate($fecha)
    {
        $fechaIF[] = str_replace('/', '-', trim(substr($fecha, 0, strpos($fecha, "-"))));
        $fechaIF[] = str_replace('/', '-', trim(substr($fecha, strpos($fecha, "-") + 1)));
        setcookie('cfechaI', $fechaIF[0]);
        setcookie('cfechaF', $fechaIF[1]);
        return $fechaIF;
    }

    public function exportDocument(Request $request)
    {
        $fecha = $this->formatDate($request['rfecha']);
        return Excel::download(new EnergyRecordsExport([$this->camposGeneral[$request['fuenteID']][$request['datosID']], $fecha[0], $fecha[1], $request['areaID']]), 'MonitoreoSeneamReport.xlsx');
    }
}
