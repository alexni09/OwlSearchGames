<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        $this->call(CardinalSeeder::class);
        $this->call(LocaleSeeder::class);
        $this->call(PronounSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ScoreSeeder::class);
        $this->call(BackgroundSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(WordSeeder::class);
        $this->call(BannedEmailSeeder::class);
        $this->call(BannedUserIdSeeder::class);
    }
}