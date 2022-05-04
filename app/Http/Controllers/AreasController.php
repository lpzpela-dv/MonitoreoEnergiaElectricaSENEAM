<?php

namespace App\Http\Controllers;

use App\Models\Aeropuerto;
use Illuminate\Http\Request;
use App\Models\Area;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($aero_id)
    {
        $aeropuertos  = Aeropuerto::all();
        $areas = Area::all()->where('aeropuerto_id', $aero_id);
        return view('area', compact('areas', 'aeropuertos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $area =  Area::create([
            'aeropuerto_id' => $request['aeropuerto_id'],
            'areaName' => $request['areaName'],
            'maxDiesel' => $request['maxDiesel'],
        ]);
        return redirect()->route('areasIndex', $request['aeropuerto_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = Area::find($id);
        return $area;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $area = Area::find($id);
        $area->areaName = $request['areaName'];
        $area->maxDiesel = $request['maxDiesel'];
        $area->save();
        return response()->json(["status" => "success", "id" => $id, "message" => "Registro Actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::find($id)->delete();
        if ($area == 1) {
            return response()->json(["status" => "success", "id" => $id, "message" => "Registro Eliminado"]);
        } else {
            return response()->json(["status" => "failed", "message" => "No fue posible eliminar el usuario"]);
        }
    }
}
