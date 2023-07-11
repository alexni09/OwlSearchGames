<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\User;
use App\Models\Permission;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\UserClasses\MailMessage;
use App\Models\Locale;
use App\UserClasses\BaseLanguage;

class AuthServiceProvider extends ServiceProvider {
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void {
        /* Authorization */
        $this->registerPolicies();
        foreach(Permission::pluck('name') as $permission) {
            Gate::define($permission, function($user) use ($permission) {
                return Permission::userHasPermission($user->id, $permission);
            });
        }
        /* 
            Sends out the notification with the email verification request.
            One notification serves these three events: 
                Illuminate\Auth\Events\Registered
                App\Events\UserUpdatedEmail
                App\Events\UserRequestedAnotherVerificationEmail
        */ 
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