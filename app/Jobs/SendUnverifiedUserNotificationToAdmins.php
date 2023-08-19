<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\UnverifiedUserMail;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SendUnverifiedUserNotificationToAdmins implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct() {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        $qty = User::selectRaw('count(*) as qty')->whereNull('email_verified_at')->get()[0]->qty;
        if ($qty > 0) {
            $admin_notifiables = DB::table('admin_notifiables')->select('id');
            $admins = User::whereIn('id', $admin_notifiables)->get();
            foreach($admins as $admin) {
                Mail::to($admin)->send(new UnverifiedUserMail());
            }
        }
    }
}