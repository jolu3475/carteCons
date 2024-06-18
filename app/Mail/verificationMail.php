<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class verificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contenu;
    public $subject;
    public $numVer;

    /**
     * Create a new message instance.
     */
    public function __construct($contenu, $subject, $numVer)
    {
        $this->contenu = $contenu;
        $this->subject = $subject;
        $this->numVer = $numVer;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('jolu032302@gmail.com', 'Verification Email'),
            replyTo:[
                new Address('jolu032302@gmail.com', 'Verification Email'),
            ],
            subject: $this->subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mailEnvoye.verifiEmail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
