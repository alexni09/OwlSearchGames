<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisteredUserMail;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SendRegisteredUserNotificationToAdmins implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user = null;

    /**
     * Create a new job instance.
     */
    public function __construct($user) {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        $admin_notifiables = DB::table('admin_notifiables')->select('id');
        $admins = User::whereIn('id', $admin_notifiables)->get();
        foreach($admins as $admin) {
            Mail::to($admin)->send(new RegisteredUserMail($this->user));
        }
    }
}