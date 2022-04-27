<?php

namespace App\Http\Controllers;

use App\Models\Aeropuerto;
use App\Models\NotificationEmail;
use Illuminate\Http\Request;

class AeropuertoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aeros = Aeropuerto::all();
        return view('aeropuerto', compact('aeros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aero =  Aeropuerto::create([
            'shortName' => $request['shortName'],
            'description' => $request['description'],
        ]);

        //Crear campos para las notificaciones
        $notif1 = NotificationEmail::create([
            'aeropuerto_id' => $aero['id'],
            'type' => 1,
            'emails' => '',
        ]);
        $notif0 = NotificationEmail::create([
            'aeropuerto_id' => $aero['id'],
            'type' => 0,
            'emails' => '',
        ]);
        return redirect()->route('aeropuertoIndex');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aeropuerto  $aeropuerto
     * @return \Illuminate\Http\Response
     */
    public function show($aeropuerto)
    {
        $aero = Aeropuerto::find($aeropuerto);
        return $aero;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aeropuerto  $aeropuerto
     * @return \Illuminate\Http\Response
     */
    public function edit(Aeropuerto $aeropuerto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aeropuerto  $aeropuerto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $aeropuerto)
    {
        dd($request);
        $aero = Aeropuerto::find($aeropuerto);
        $aero->shortName = $request['shortName'];
        $aero->description = $request['description'];
        $aero->save();
        return redirect()->route('aeropuertoIndex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aeropuerto  $aeropuerto
     * @return \Illuminate\Http\Response
     */
    public function destroy($aero_id)
    {
        //return response()->json(["status" => "success", "id" => $aero_id, "message" => "Registro Eliminado"]);
        $aero = Aeropuerto::where("id", $aero_id)->delete();
        if ($aero == 1) {
            return response()->json(["status" => "success", "id" => $aero_id, "message" => "Registro Eliminado"]);
        } else {
            return response()->json(["status" => "failed", "message" => "No fue posible eliminar el usuario"]);
        }
    }
}
