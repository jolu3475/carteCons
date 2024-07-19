<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class userMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $contenu;
    public $link;

    /**
     * Create a new message instance.
     */
    public function __construct($contenu, $subject, $link)
    {
        $this->contenu = $contenu;
        $this->subject = $subject;
        $this->link = $link;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('jolu032302@gmail.com', 'MAE'),
            replyTo:[
                new Address('jolu032302@gmail.com', 'MAE'),
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
            view: 'mailEnvoye.userMail',
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
