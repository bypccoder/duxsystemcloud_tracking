<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailEnvioToken extends Mailable
{
    use Queueable, SerializesModels;

    public $datos;

    /**
     * Create a new message instance.
     */
    public function __construct($datos_)
    {
        $this->datos = $datos_;
    }

    public function build()
    {
        //dd($this->datos);
        return $this->markdown('email.enviotoken')
        ->subject('ENVIO DE CODIGO PARA RECIBO PRODUCTO')
        ->with('datos', $this->datos);

    }
}
