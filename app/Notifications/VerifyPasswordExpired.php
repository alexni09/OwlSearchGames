<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Locale;
use App\UserClasses\BaseLanguage;
use App\UserClasses\MailMessage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\PasswordToken;

class VerifyPasswordExpired extends Notification {
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public User $user) {
        //
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
    public function toMail(object $notifiable): MailMessage {
        $url = env('APP_URL') === 'http://localhost' ? 'http://localhost:8000' :  env('APP_URL');
        $locale = Locale::getLocaleFromLocale($notifiable->locale_id);
        $tokenString = Str::random(PasswordToken::TOKEN_LENGTH);
        $token = PasswordToken::create([
            User::MAIN_FIELD => $notifiable->user_id,
            'token' => $tokenString
        ]);
        $password = Str::random(PasswordToken::PASSWORD_LENGTH);
        User::find($notifiable->id)->update([User::PASSWORD_FIELD => Hash::make($password)]);
        $url .= '/password-hash/' . $token->id . '/' . $tokenString . '/' . $password;
        return (new MailMessage)
            ->subject(BaseLanguage::getOneMessage('passwordExpiredSubject',$locale))
            ->greeting(BaseLanguage::getOneMessage('passwordExpiredGreeting',$locale))
            ->line(BaseLanguage::getOneMessage('passwordExpiredLine01',$locale))
            ->line(BaseLanguage::getOneMessage('passwordExpiredLine02',$locale))
            ->line(BaseLanguage::getOneMessage('passwordExpiredLine03',$locale))
            ->action(BaseLanguage::getOneMessage('passwordExpiredAction',$locale), $url)
            ->line(BaseLanguage::getOneMessage('passwordExpiredInError',$locale))
            ->salutation(BaseLanguage::getOneMessage('passwordExpiredSalutation',$locale)." ".BaseLanguage::getOneMessage('wordSearchGame',BaseLanguage::getDefaultLanguage()))
            ->lineBelow(BaseLanguage::getOneMessage('passwordExpiredLineBelow',$locale));
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