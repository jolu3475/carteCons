<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ValidCarte extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $contenu;
     public $subject;
     public $pdf;

    public function __construct( $contenu, $subject, $pdf)
    {
        $this->contenu = $contenu;
        $this->subject = $subject;
        $this->pdf = $pdf;
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
            view: 'mailEnvoye.validMail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // Chemin vers le fichier PDF
        $pdfPath = public_path('pdf/'.$this->pdf.'.pdf');

        // Nom du fichier PDF
        $pdfName = basename($pdfPath);

        // Ajoutez le fichier PDF comme un attachment
        return [
            Attachment::fromPath($pdfPath),
        ];
    }
}
