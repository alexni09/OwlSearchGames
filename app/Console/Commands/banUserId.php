<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BannedUserId;

class banUserId extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:banUserId {part} {operation=2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bans {part} of an user_id string; or all of it (if operation===1).';

    /**
     * Execute the console command.
     */
    public function handle() {
        $part = $this->argument('part');
        $operation = $this->argument('operation');
        if (BannedUserId::exists($part,$operation)) echo ("Already exists.\nFailed.\n");
        else {
            BannedUserId::create(['part' => $part, 'operation' => $operation]);
            echo ("Success!\n");
        }
    }
}