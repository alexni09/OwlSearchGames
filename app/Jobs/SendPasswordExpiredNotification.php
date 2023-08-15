<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Events\PasswordExpired;
use App\Models\User;
use App\Notifications\VerifyPasswordExpired;

class SendPasswordExpiredNotification implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected User $user;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        if ($this->user->status === User::STATUS_FIELD_PASSWORD_EXPIRED) $this->user->notify(new VerifyPasswordExpired($this->user));
    }
}