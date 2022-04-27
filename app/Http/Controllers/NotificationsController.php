<?php

namespace App\Http\Controllers;

use App\Mail\energyNotifMailable;
use App\Models\Alarma;
use App\Models\NotificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NotificationsController extends Controller
{
    public function sendAlert($alertId, $type)
    {
        //obtener data
        $data = Alarma::find($alertId);
        $correo = null;
        $destinatarios = null;
        $destinatariostxt = "";
        $emails = DB::table('emailsbyareaview')->where('id', $data['area_id'])->get();
        // Validar tipo de alerta
        if ($type == 1) {
            foreach ($emails as $email) {
                if ($email->type == "1") {
                    $destinatarios = $this->formatEmails($email->emails);
                }
            }

            $correo = new energyNotifMailable($data);
        }
        Mail::to($destinatarios)->send($correo);
        for ($i = 0; $i < count($destinatarios); $i++) {
            $destinatariostxt = $destinatariostxt . " " . $destinatarios[$i];
        }
        return response("Correo enviado con id en tabla Alamras No." . strval($data['id']) . " con destinatarios: " . $destinatariostxt, 200)
            ->header('Content-Type', 'text/plain');
    }

    public function formatEmails($emails)
    {
        $datos = $emails;
        $destinatarios = null;
        while (strpos($datos, ";") != false) {
            $destinatarios[] = substr($datos, 0, strpos($datos, ";"));
            $datos = substr($datos, strpos($datos, ";") + 1);
        }
        if (strpos($datos, "@") != false) {
            $destinatarios[] = $datos;
        }
        return $destinatarios;
    }

    public function index()
    {
        $aeroID = $_COOKIE['id_aero_selected'];
        $emails = NotificationEmail::where('aeropuerto_id', $aeroID)->get();
        return view('notifications', compact('emails'));
    }

    public function update(Request $request)
    {
        $notify = NotificationEmail::findOrFail($request->notifyID);
        $notify->emails = $request->emails;
        $notify->save();
        return redirect()->route('emails');
    }
}
