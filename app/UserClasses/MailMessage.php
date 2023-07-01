<?php

namespace App\UserClasses;

use Illuminate\Notifications\Messages\MailMessage as NotificationMailMessage;

class MailMessage extends NotificationMailMessage {
    /**
     * The notification's lineBelow.
     *
     * @var string
     */
    public $lineBelow;

    /**
     * Set the lineBelow of the notification.
     *
     * @param  string  $lineBelow
     * @return $this
     */
    public function lineBelow($lineBelow) {
        $this->lineBelow = $lineBelow;
        return $this;
    }

    /**
     * Get an array representation of the message.
     *
     * @return array
     */
    public function toArray() {
        return [
            'level' => $this->level,
            'subject' => $this->subject,
            'greeting' => $this->greeting,
            'salutation' => $this->salutation,
            'introLines' => $this->introLines,
            'outroLines' => $this->outroLines,
            'actionText' => $this->actionText,
            'actionUrl' => $this->actionUrl,
            'displayableActionUrl' => str_replace(['mailto:', 'tel:'], '', $this->actionUrl ?? ''),
            'lineBelow' => $this->lineBelow
        ];
    }
}