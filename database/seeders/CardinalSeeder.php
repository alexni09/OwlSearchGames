<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cardinal;

class CardinalSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Cardinal::create([
            'cardinal' => 1,
            'de' => 'eins',
            'en' => 'one',
            'es' => 'uno',
            'pt' => 'um'
        ]);
        Cardinal::create([
            'cardinal' => 2,
            'de' => 'zwei',
            'en' => 'two',
            'es' => 'dos',
            'pt' => 'dois'
        ]);
        Cardinal::create([
            'cardinal' => 3,
            'de' => 'drei',
            'en' => 'three',
            'es' => 'tres',
            'pt' => 'três'
        ]);
        Cardinal::create([
            'cardinal' => 4,
            'de' => 'vier',
            'en' => 'four',
            'es' => 'cuatro',
            'pt' => 'quatro'
        ]);
        Cardinal::create([
            'cardinal' => 5,
            'de' => 'fünf',
            'en' => 'five',
            'es' => 'cinco',
            'pt' => 'cinco'
        ]);
        Cardinal::create([
            'cardinal' => 6,
            'de' => 'sechs',
            'en' => 'six',
            'es' => 'seis',
            'pt' => 'seis'
        ]);
        Cardinal::create([
            'cardinal' => 7,
            'de' => 'sieben',
            'en' => 'seven',
            'es' => 'siete',
            'pt' => 'sete'
        ]);
        Cardinal::create([
            'cardinal' => 8,
            'de' => 'acht',
            'en' => 'eight',
            'es' => 'ocho',
            'pt' => 'oito'
        ]);
        Cardinal::create([
            'cardinal' => 9,
            'de' => 'neun',
            'en' => 'nine',
            'es' => 'nueve',
            'pt' => 'nove'
        ]);
        Cardinal::create([
            'cardinal' => 10,
            'de' => 'zehn',
            'en' => 'ten',
            'es' => 'diez',
            'pt' => 'dez'
        ]);
        Cardinal::create([
            'cardinal' => 11,
            'de' => 'elf',
            'en' => 'eleven',
            'es' => 'once',
            'pt' => 'onze'
        ]);
        Cardinal::create([
            'cardinal' => 12,
            'de' => 'zwölf',
            'en' => 'twelve',
            'es' => 'doce',
            'pt' => 'doze'
        ]);
        Cardinal::create([
            'cardinal' => 13,
            'de' => 'dreizehn',
            'en' => 'thirteen',
            'es' => 'trece',
            'pt' => 'treze'
        ]);
        Cardinal::create([
            'cardinal' => 14,
            'de' => 'vierzehn',
            'en' => 'fourteen',
            'es' => 'catorce',
            'pt' => 'catorze'
        ]);
        Cardinal::create([
            'cardinal' => 15,
            'de' => 'fünfzehn',
            'en' => 'fifteen',
            'es' => 'quince',
            'pt' => 'quinze'
        ]);
        Cardinal::create([
            'cardinal' => 16,
            'de' => 'sechzehn',
            'en' => 'sixteen',
            'es' => 'dieciseis',
            'pt' => 'dezesseis'
        ]);
        Cardinal::create([
            'cardinal' => 17,
            'de' => 'siebzehn',
            'en' => 'seventeen',
            'es' => 'diecisiete',
            'pt' => 'dezessete'
        ]);
        Cardinal::create([
            'cardinal' => 18,
            'de' => 'achtzehn',
            'en' => 'eighteen',
            'es' => 'dieciocho',
            'pt' => 'dezoito'
        ]);
        Cardinal::create([
            'cardinal' => 19,
            'de' => 'neunzehn',
            'en' => 'nineteen',
            'es' => 'diecinueve',
            'pt' => 'dezenove'
        ]);
        Cardinal::create([
            'cardinal' => 20,
            'de' => 'zwanzig',
            'en' => 'twenty',
            'es' => 'veinte',
            'pt' => 'vinte'
        ]);
    }
}