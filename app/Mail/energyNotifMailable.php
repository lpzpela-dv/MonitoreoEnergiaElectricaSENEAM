<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class energyNotifMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Centro Notificaciónes Monitoreo SENEAM BETA";
    public $alertJson;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->alertJson = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->alertJson;
        return $this->view('emails.prueba', compact('data'));
    }
}
