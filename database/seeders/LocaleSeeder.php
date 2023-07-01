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
        Locale::create([
            'locale' => 'en',
            'name' => 'English',
            'active' => true
        ]);        
        Locale::create([
            'locale' => 'pt',
            'name' => 'Português',
            'active' => true
        ]);
        Locale::create([
            'locale' => 'es',
            'name' => 'Español'
        ]);        
        Locale::create([
            'locale' => 'de',
            'name' => 'Deutsch'
        ]);
    }
}