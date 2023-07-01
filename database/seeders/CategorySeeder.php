<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Locale;
use App\Models\User;
use App\Models\Permission;

class CategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $uid1 = User::getIdFromUserId('anonymous');
        $en = Locale::getIdFromLocale('en');
        $pt = Locale::getIdFromLocale('pt');
        $advanced = Permission::getIdFromName('main.difficulty.difficult');

        Category::create([
            'category' => 'verduras',
            'locale_id' => $pt,
            'user_id' => $uid1
        ]);
        Category::create([
            'category' => 'vegetables',
            'locale_id' => $en,
            'user_id' => $uid1
        ]);
        Category::create([
            'category' => 'legumes',
            'locale_id' => $pt,
            'user_id' => $uid1
        ]);
        Category::create([
            'category' => 'frutas',
            'locale_id' => $pt,
            'user_id' => $uid1
        ]);
        Category::create([
            'category' => 'flores',
            'locale_id' => $pt,
            'user_id' => $uid1
        ]);
        Category::create([
            'category' => 'fruits',
            'locale_id' => $en,
            'user_id' => $uid1
        ]);
        Category::create([
            'category' => 'spices',
            'locale_id' => $en,
            'user_id' => $uid1
        ]);
        Category::create([
            'category' => 'animals',
            'locale_id' => $en,
            'user_id' => $uid1
        ]);
        Category::create([
            'category' => 'monsters',
            'locale_id' => $en,
            'user_id' => $uid1,
            'permission_id' => $advanced
        ]);
    }
}