<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Events\ContactEmailSent;
use App\Models\Locale;
use App\UserClasses\BaseLanguage;
use App\UserClasses\MailMessage;

class SendContactEmail extends Notification {
    use Queueable;

    public $event = null;

    /**
     * Create a new notification instance.
     */
    public function __construct(ContactEmailSent $event) {
        $this->event = $event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(): MailMessage {
        $locale = null;
        if ($this->event->user_id !== null) $locale = Locale::getLocaleFromUserId($this->event->user_id);
        else $locale = session('locale', BaseLanguage::getDefaultLanguage());
        return (new MailMessage)
            ->subject(BaseLanguage::getOneMessage('contactEmailSubject',$locale))
            ->line('[' . $this->event->user_id . ']')
            ->line($this->event->name)
            ->line($this->event->email)
            ->line($this->event->message);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}