<?php

namespace App\Http\Controllers;

use App\Models\Aeropuerto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
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

    public function index()
    {
        $aeropuertos = Aeropuerto::all();
        $Users = User::All();
        return view('usuarios', compact('Users', 'aeropuertos'));
    }

    public function indexAPI()
    {
        $Users = User::All();
        return $Users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user =  User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'userRol' => 1,
        ]);

        return redirect()->route('user');
    }
    public function destroy($id)
    {
        $user = User::where("id", $id)->delete();
        if ($user == 1) {
            return response()->json(["status" => "success", "id" => $id, "message" => "Registro Eliminado"]);
        } else {
            return response()->json(["status" => "failed", "message" => "No fue posible eliminar el usuario"]);
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $user = User::find($id);
        if ($request['tpass'] == 'true') {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->password = Hash::make($request['password']);
        } else {
            $user->name = $request['name'];
            $user->email = $request['email'];
        }
        $user->save();
        return response()->json(["status" => "success", "id" => $id, "message" => "Registro Actualizado"]);
    }
}
