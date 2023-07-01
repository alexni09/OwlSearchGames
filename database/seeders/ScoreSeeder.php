<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Score;

class ScoreSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Score::create([
            User::MAIN_FIELD => 'anonymous',
            'difficultyLevel' => 0,
            'difficulty' => -65,
            'score' => Score::getEffectiveScore(-65)
        ]);

        Score::create([
            User::MAIN_FIELD => 'anonymous',
            'difficultyLevel' => 0,
            'difficulty' => -5,
            'score' => Score::getEffectiveScore(-5)
        ]);

        Score::create([
            User::MAIN_FIELD => 'anonymous',
            'difficultyLevel' => 1,
            'difficulty' => 35,
            'score' => Score::getEffectiveScore(35)
        ]);

        Score::create([
            User::MAIN_FIELD => 'anonymous',
            'difficultyLevel' => 1,
            'difficulty' => 48
        ]);

        Score::create([
            User::MAIN_FIELD => 'anonymous',
            'difficultyLevel' => 1,
            'difficulty' => 50
        ]);

        Score::create([
            User::MAIN_FIELD => 'anonymous',
            'difficultyLevel' => 2,
            'difficulty' => 77,
            'score' => Score::getEffectiveScore(77)
        ]);

        Score::create([
            User::MAIN_FIELD => 'anonymous',
            'difficultyLevel' => 2,
            'difficulty' => 83,
            'score' => Score::getEffectiveScore(83)
        ]);

        Score::create([
            User::MAIN_FIELD => 'anonymous',
            'difficultyLevel' => 2,
            'difficulty' => 87,
            'score' => Score::getEffectiveScore(87)
        ]);

        Score::create([
            User::MAIN_FIELD => 'anonymous',
            'difficultyLevel' => 3,
            'difficulty' => 99,
            'score' => Score::getEffectiveScore(99)
        ]);

        Score::create([
            User::MAIN_FIELD => 'anonymous',
            'difficultyLevel' => 3,
            'difficulty' => 107,
            'score' => Score::getEffectiveScore(107)
        ]);

        Score::create([
            User::MAIN_FIELD => 'anonymous',
            'difficultyLevel' => 3,
            'difficulty' => 110,
            'score' => Score::getEffectiveScore(110)
        ]);

        Score::create([
            User::MAIN_FIELD => 'anonymous',
            'difficultyLevel' => 4,
            'difficulty' => 150,
            'score' => Score::getEffectiveScore(150)
        ]);

        Score::create([
            User::MAIN_FIELD => 'anonymous',
            'difficultyLevel' => 4,
            'difficulty' => 164,
            'score' => Score::getEffectiveScore(164)
        ]);

        Score::create([
            User::MAIN_FIELD => 'manel',
            'difficultyLevel' => 0,
            'difficulty' => 0,
            'score' => Score::getEffectiveScore(0)
        ]);

        Score::create([
            User::MAIN_FIELD => 'manel',
            'difficultyLevel' => 0,
            'difficulty' => 0,
            'score' => Score::getEffectiveScore(0)
        ]);

        Score::create([
            User::MAIN_FIELD => 'manel',
            'difficultyLevel' => 1,
            'difficulty' => 39,
            'score' => Score::getEffectiveScore(39)
        ]);

        Score::create([
            User::MAIN_FIELD => 'manel',
            'difficultyLevel' => 1,
            'difficulty' => 43,
            'score' => Score::getEffectiveScore(43)
        ]);

        Score::create([
            User::MAIN_FIELD => 'manel',
            'difficultyLevel' => 4,
            'difficulty' => 345,
            'score' => 1430
        ]);

        Score::create([
            User::MAIN_FIELD => 'smith',
            'difficultyLevel' => 4,
            'difficulty' => 1122,
            'score' => 9987
        ]);

    }
}