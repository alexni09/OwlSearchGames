<?php

namespace App\Listeners;

use App\Events\BannedEmailFlagged;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\BannedEmailLog;

class LogBannedEmail implements ShouldQueue {
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
    public function handle(BannedEmailFlagged $event): void {
        BannedEmailLog::create([
            'part' => $event->part,
            'status' => $event->status,
            'ip' => $event->ip
        ]);
    }
}