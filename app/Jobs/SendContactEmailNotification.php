<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\SendContactEmail;
use Illuminate\Support\Facades\Notification;
use App\Events\ContactEmailSent;

class SendContactEmailNotification implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $event = null;

    /**
     * Create a new job instance.
     */
    public function __construct(ContactEmailSent $event) {
        $this->event = $event;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        Notification::route('mail', $this->event->send_to)->notify(new SendContactEmail($this->event));
    }
}