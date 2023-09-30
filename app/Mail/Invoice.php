<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Invoice extends Mailable
{
  use Queueable, SerializesModels;
  public $detail;
  /**
   * Create a new message instance.
   */
  public function __construct($detail)
  {
    $this->detail = $detail;
  }

  /**
   * Get the message envelope.
   */
  public function envelope(): Envelope
  {
    return new Envelope(
      from: new Address('admin@noiu.eo', $this->detail['reply_name']),
      replyTo: [
        new Address($this->detail['reply_mail'], $this->detail['reply_name'])
      ],
      subject: $this->detail['subject'],
    );
  }

  /**
   * Get the message content definition.
   */
  public function content(): Content
  {
    return new Content(
      view: 'emails.invoice',
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
