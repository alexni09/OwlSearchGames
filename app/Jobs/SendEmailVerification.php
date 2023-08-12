<?php

namespace App\Jobs;
 
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
 
class SendEmailVerification implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
 
    protected $user;

    public function __construct(User $user) {
        $this->user = $user;
    }
 
    public function handle(): void {
        if ($this->user instanceof MustVerifyEmail && !$this->user->hasVerifiedEmail()) {
            $this->user->sendEmailVerificationNotification();
        }
    }
}