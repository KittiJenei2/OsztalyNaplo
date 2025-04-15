<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class StudentListMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdf;

    public function __construct($pdf)
    {
        $this->pdf = $pdf;
    }

    /**
     * Get the message envelope.
     */

     public function build()
    {
        return $this->subject('Tanulók listája PDF formátumban')
                    ->view('emails.student_list')
                    ->attachData($this->pdf, 'students-list.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
    
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Student List Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
