<?php

namespace App\Listeners;

use App\Events\BannedUserIdFlagged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\BannedUserIdLog;

class LogBannedUserId implements ShouldQueue {
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BannedUserIdFlagged $event): void {
        BannedUserIdLog::create([
            'part' => $event->part,
            'status' => $event->status,
            'ip' => $event->ip
        ]);
    }
}