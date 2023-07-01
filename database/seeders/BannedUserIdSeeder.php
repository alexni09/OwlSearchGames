<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BannedUserId;

class BannedUserIdSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        BannedUserId::create(['part' => 'shit']);
        BannedUserId::create(['part' => 'poop']);
        BannedUserId::create(['part' => 'admin', 'operation' => 1]);
        BannedUserId::create(['part' => 'administrator', 'operation' => 1]);
        BannedUserId::create(['part' => 'alexni09', 'operation' => 1]);
        BannedUserId::create(['part' => 'anonymous', 'operation' => 1]);
        BannedUserId::create(['part' => 'useradmin', 'operation' => 1]);
    }
}