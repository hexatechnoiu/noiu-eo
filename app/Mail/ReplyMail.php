<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ReplyMail extends Mailable
{
    use Queueable, SerializesModels;
public $data;
    /**
     * Create a new message instance.
     */
  public function __construct($data)
  {
    $this->data = $data;
  }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
    return new Envelope(
      from: new Address('admin@noiu.eo', $this->data['replier']),
      replyTo: [
        new Address($this->data['reply_mail'], $this->data['replier'])
      ],
      subject: $this->data['subject'],
    );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.reply',
        );
    }
    public function attachments(): array
    {
        return [];
    }
}
