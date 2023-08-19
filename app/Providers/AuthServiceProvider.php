<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Permission;
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
    }
}