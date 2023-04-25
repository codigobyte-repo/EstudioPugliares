<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PostMaillable extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $namePost;
    public $slug;
    public $subscriptor;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $slug, $nombreSubscriptor)
    {
        $this->namePost = $name;
        $this->slug = $slug;
        $this->subscriptor = $nombreSubscriptor;
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
            subject: 'Nueva nota de Estudio Pugliares: ' . $this->namePost,
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
            view: 'mails.posts',
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
