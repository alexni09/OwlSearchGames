<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\User;

class UnverifiedUserMail extends Mailable {
    use Queueable, SerializesModels;

    public $records;

    /**
     * Create a new message instance.
     */
    public function __construct() {
        $this->records = User::select(['id','user_id','status','name','email','created_at','updated_at'])->whereNull('email_verified_at')->get();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
            from: new Address(env('MAIL_USERNAME'), 'Owl Search Games'),
            subject: 'Unverified User(s) - Owl Search Games',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            view: 'emails.unverifiedUserFlagged'
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