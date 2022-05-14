<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class dieselNotifMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject = "Centro Notificaciónes Monitoreo SENEAM BETA";
    public $alertMessage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->alertMessage = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->alertMessage;
        return $this->view('emails.diesel', compact('data'));
    }
}
