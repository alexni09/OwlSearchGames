<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\BannedEmail;

class banEmail extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:banEmail {part} {operation=2}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bans {part} of an email address, like all of a domain name; or all of it (if operation===1).';

    /**
     * Execute the console command.
     */
    public function handle() {
        $part = $this->argument('part');
        $operation = $this->argument('operation');
        if (BannedEmail::exists($part,$operation)) echo ("Already exists.\nFailed.\n");
        else {
            BannedEmail::create(['part' => $part, 'operation' => $operation]);
            echo ("Success!\n");
        }
    }
}