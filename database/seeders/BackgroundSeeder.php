<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Background;
use App\Models\Permission;

class BackgroundSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $advanced = Permission::getIdFromName('background.advanced');
        $premium = Permission::getIdFromName('background.premium');
        Background::create([
            'img' => '1_20190520_101945.jpg',
            'background_position' => 'center',
            'description' => 'Algarve, Praia de São Rafael'
        ]);
        Background::create([
            'img' => '1_20190521_163010.jpg',
            'background_position' => 'center',
            'description' => 'Algarve, Praia do Castelo'
        ]);
        Background::create([
            'img' => '1_20220120_160101.jpg',
            'background_position' => 'center',
            'description' => 'Sintra'
        ]);
        Background::create([
            'img' => '1_IMG20220202192929.jpg',
            'background_position' => 'center',
            'description' => 'Badajoz, La Giralda'
        ]);
        Background::create([
            'img' => '1_IMG20230124114553.jpg',
            'background_position' => 'center',
            'description' => 'Sevilha, Torre del Oro'
        ]);
        Background::create([
            'img' => '1_IMG20220209142559.jpg',
            'background_position' => 'center',
            'description' => 'OPorto'
        ]);
        Background::create([
            'img' => '1_IMG20230124131616.jpg',
            'background_position' => 'center',
            'description' => 'Sevilha'
        ]);
        Background::create([
            'img' => '1_IMG20230127171259.jpg',
            'background_position' => 'bottom',
            'description' => 'Sierra Nevada'
        ]);
        Background::create([
            'img' => '1_IMG20230129150308.jpg',
            'background_position' => 'center',
            'description' => 'Granada, Alhambra'
        ]);
        Background::create([
            'img' => '1_IMG20230129153527.jpg',
            'background_position' => 'center',
            'description' => 'Granada, Alhambra'
        ]);
        Background::create([
            'img' => '1_IMG20230129154217.jpg',
            'background_position' => 'center',
            'description' => 'Granada, Alhambra'
        ]);
        Background::create([
            'img' => '1_IMG20230131122613.jpg',
            'background_position' => 'center',
            'description' => 'Málaga, Malagueta'
        ]);
        Background::create([
            'img' => '2_20190520_101122.jpg',
            'background_position' => 'center',
            'permission_id' => $advanced,
            'description' => 'Algarve, Praia de São Rafael'
        ]);
        Background::create([
            'img' => '2_20190521_163517.jpg',
            'background_position' => 'center',
            'permission_id' => $advanced,
            'description' => 'Algarve, Praia do Castelo'
        ]);
        Background::create([
            'img' => '2_IMG20220203110306.jpg',
            'background_position' => 'bottom',
            'permission_id' => $advanced,
            'description' => 'Badajoz, Alcazaba'
        ]);
        Background::create([
            'img' => '2_IMG20220208110343.jpg',
            'background_position' => 'bottom',
            'permission_id' => $advanced,
            'description' => 'Aveiro'
        ]);
        Background::create([
            'img' => '2_IMG20230124115659.jpg',
            'background_position' => 'top',
            'permission_id' => $advanced,
            'description' => 'Sevilha'
        ]);
        Background::create([
            'img' => '2_IMG20230131170148.jpg',
            'background_position' => 'center',
            'permission_id' => $advanced,
            'description' => 'Málaga'
        ]);
        Background::create([
            'img' => '3_20190521_115738.jpg',
            'background_position' => 'center',
            'permission_id' => $premium,
            'description' => 'Algarve, Praia da Marinha'
        ]);
        Background::create([
            'img' => '3_20190521_162438.jpg',
            'background_position' => 'center',
            'permission_id' => $premium,
            'description' => 'Algarve, Praia da Marinha'
        ]);
        Background::create([
            'img' => '3_IMG20220131165937.jpg',
            'background_position' => 'bottom right',
            'permission_id' => $premium,
            'description' => 'Évora'
        ]);
        Background::create([
            'img' => '3_IMG20220209150156.jpg',
            'background_position' => 'center',
            'permission_id' => $premium,
            'description' => 'OPorto'
        ]);
        Background::create([
            'img' => '3_IMG20230125123341.jpg',
            'background_position' => 'center',
            'permission_id' => $premium,
            'description' => 'Sevilha, Real Alcázar'
        ]);
        Background::create([
            'img' => '3_IMG20230129153933.jpg',
            'background_position' => 'center',
            'permission_id' => $premium,
            'description' => 'Granada, Alhambra'
        ]);
    }
}