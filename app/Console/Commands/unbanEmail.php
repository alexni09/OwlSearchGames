<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BannedEmail;

class unbanEmail extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:unbanEmail {part} {operation=2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Unbans {part} of an email address, like all of a domain name; or all of it (if operation===1).';

    /**
     * Execute the console command.
     */
    public function handle() {
        $part = $this->argument('part');
        $operation = $this->argument('operation');
        if (!BannedEmail::exists($part,$operation)) echo ("Doesn't exist.\nFailed.\n");
        else {
            BannedEmail::deleteByPartAndByOperation($part,$operation);
            echo ("Success!\n");
        }
    }
}