<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\FlaggedEmailMail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\BannedEmailLog;

class sendFlaggedEmailsToAdmins implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct() 
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        $qty = BannedEmailLog::selectRaw('count(*) as qty')->where('status',0)->get()[0]->qty;
        if ($qty >0) {
            BannedEmailLog::where('status',0)->update(['status' => 1]);
            $admin_notifiables = DB::table('admin_notifiables')->select('id');
            $admins = User::whereIn('id', $admin_notifiables)->get();
            foreach($admins as $admin) {
                Mail::to($admin)->send(new FlaggedEmailMail());
            }
            BannedEmailLog::where('status',1)->update([ 'status' => 2 ]);
        }
    }
}