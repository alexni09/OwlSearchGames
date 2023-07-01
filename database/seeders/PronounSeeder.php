<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Locale;
use App\Models\Pronoun;

class PronounSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $en = Locale::getIdFromLocale('en');
        $pt = Locale::getIdFromLocale('pt');

        Pronoun::create([
            'locale_id' => $en,
            'pronoun' => 'Mr.',
            'sex' => 'M'
        ]);
        Pronoun::create([
            'locale_id' => $en,
            'pronoun' => 'Ms.',
            'sex' => 'F'
        ]);
        Pronoun::create([
            'locale_id' => $en,
            'pronoun' => 'Mrs.',
            'sex' => 'F'
        ]);
        Pronoun::create([
            'locale_id' => $en,
            'pronoun' => 'Dr.',
            'sex' => 'O'
        ]);
        Pronoun::create([
            'locale_id' => $pt,
            'pronoun' => 'Sr.',
            'sex' => 'M'
        ]);
        Pronoun::create([
            'locale_id' => $pt,
            'pronoun' => 'Sra.',
            'sex' => 'F'
        ]);
        Pronoun::create([
            'locale_id' => $pt,
            'pronoun' => 'Dr.',
            'sex' => 'M'
        ]);
        Pronoun::create([
            'locale_id' => $pt,
            'pronoun' => 'Dra.',
            'sex' => 'F'
        ]);
        Pronoun::create([
            'locale_id' => $pt,
            'pronoun' => 'Srta.',
            'sex' => 'F'
        ]);
    }
}