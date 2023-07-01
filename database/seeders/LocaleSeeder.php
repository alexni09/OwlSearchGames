<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Locale;

class LocaleSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Locale::factory()->create([
            'locale' => 'en',
            'name' => 'English',
            'active' => true
        ]);        
        Locale::factory()->create([
            'locale' => 'pt',
            'name' => 'Português',
            'active' => true
        ]);
        Locale::factory()->create([
            'locale' => 'es',
            'name' => 'Español'
        ]);        
        Locale::factory()->create([
            'locale' => 'de',
            'name' => 'Deutsch'
        ]);
    }
}