<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VentasMaillable extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $titulo;
    public $precio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titulo, $precio )
    {
        $this->titulo = $titulo;
        $this->precio = $precio;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: 'web@estudiopugliares.com.ar',
            subject: '¡¡ Nueva venta realizada en Sistema Web - Estudio Pugliares !!',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mails.venta',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
