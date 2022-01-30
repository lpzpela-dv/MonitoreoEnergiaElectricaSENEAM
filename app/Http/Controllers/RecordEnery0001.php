<?php

namespace App\Http\Controllers;

use App\Models\RecordEnergy_0001;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordEnery0001 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = RecordEnergy_0001::all()->orderBy('id','desc');
        $data = DB::table('Record_Energy_0001s')->orderBy('time','desc')->limit(15)->get();
        return $data;
    }

    public function getlast(){
        $data = DB::table('Record_Energy_0001s')->orderBy('time','desc')->limit(1)->get();
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = RecordEnergy_0001::create($request->all());
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
