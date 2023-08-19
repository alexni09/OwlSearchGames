<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\UserClasses\MailMessage;
use App\Models\Locale;
use App\UserClasses\BaseLanguage;

class JobServiceProvider extends ServiceProvider {
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /** 
     *  Necessary for this method call:
     *  $this->user->sendEmailVerificationNotification();
     * 
     *  Which is in:
     *  \App\Jobs\SendEmailVerification (dispatched after user registration; or when the user requests another email)
     *  \App\Jobs\SendEmailUpdatedVerification (dispatched after user profile change (with email address change); idem)
     */
    public function boot(): void {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            $locale = Locale::getLocaleFromLocale($notifiable->locale_id);
            $line = $notifiable->hasEverBeenUpdated() ? BaseLanguage::getOneMessage('emailVerificationLine03',$locale) : BaseLanguage::getOneMessage('emailVerificationLine01',$locale);
            return (new MailMessage)
                ->subject(BaseLanguage::getOneMessage('emailVerificationSubject',$locale))
                ->greeting(BaseLanguage::getOneMessage('emailVerificationGreeting',$locale))
                ->line($line)
                ->line(BaseLanguage::getOneMessage('emailVerificationLine02',$locale))
                ->action(BaseLanguage::getOneMessage('emailVerificationAction',$locale), $url)
                ->line(BaseLanguage::getOneMessage('emailVerificationInError',$locale))
                ->salutation(BaseLanguage::getOneMessage('emailVerificationSalutation',$locale)." ".BaseLanguage::getOneMessage('wordSearchGame',BaseLanguage::getDefaultLanguage()))
                ->lineBelow(BaseLanguage::getOneMessage('emailVerificationLineBelow',$locale));
        });
    }
}