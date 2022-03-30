<?php

namespace App\Http\Controllers;

use App\Mail\energyNotifMailable;
use App\Models\Alarma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NotificationsController extends Controller
{


    public function sendAlert($alertId, $type)
    {
        //obtener data
        $data = Alarma::find($alertId);
        $correo = null;
        // Validar tipo de alerta
        if ($type == 1) {
            $correo = new energyNotifMailable($data);
        }
        Mail::to("a11311178@uthermosillo.edu.mx")->send($correo);
        //$respuesta = "Correo enviado con id: " + strval($data['id']) + "para: pablo.lopez@gmai.com";
        return response("Correo enviado con id en tabla Alamras No." . strval($data['id']) . " con destinatarios: a11311178@uthermosillo.edu.mx", 200)
            ->header('Content-Type', 'text/plain');
    }
}
