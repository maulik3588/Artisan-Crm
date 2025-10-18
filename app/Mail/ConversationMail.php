<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConversationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $conversation;

    /**
     * Create a new message instance.
     */
    public function __construct($conversation)
    {
        $this->conversation = $conversation;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->conversation->subject ?? 'New Conversation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.conversation',
            with: [
                'message' => $this->conversation->message,
                'medium' => $this->conversation->medium,
                'scheduled_at' => $this->conversation->scheduled_at,
                'subject' => $this->conversation->subject,
            ],
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
