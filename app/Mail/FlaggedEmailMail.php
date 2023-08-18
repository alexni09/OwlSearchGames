<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use App\Models\BannedEmailLog;

class FlaggedEmailMail extends Mailable {
    use Queueable, SerializesModels;

    public $records;

    /**
     * Create a new message instance.
     */
    public function __construct() {
        $this->records = BannedEmailLog::select(['id','part','ip'])->where('isDisplayed',false)->where('operation',1)->get();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
            from: new Address(env('MAIL_USERNAME'), 'Owl Search Games'),
            subject: 'Flagged Mail - Owl Search Games',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            view: 'emails.bannedEmailFlagged'
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
