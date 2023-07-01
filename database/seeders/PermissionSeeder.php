<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Permission;

class PermissionSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Permission::create(['name' => 'admin.generic']);
        Permission::create(['name' => 'password.update']);
        Permission::create(['name' => 'profile.delete']);
        Permission::create(['name' => 'profile.update']);
        Permission::create(['name' => 'main.difficulty.verydifficult']);
        Permission::create(['name' => 'main.difficulty.insane']);
        Permission::create(['name' => 'main.allcontrols']);
        Permission::create(['name' => 'trophy.silver']);
        Permission::create(['name' => 'trophy.gold']);
        Permission::create(['name' => 'trophy.donor']);
        Permission::create(['name' => 'background.advanced']);
        Permission::create(['name' => 'background.premium']);
        Permission::create(['name' => 'vocabulary.advanced']);
        Permission::create(['name' => 'vocabulary.premium']);
        Permission::create(['name' => 'category.show']);
        Permission::create(['name' => 'category.create']);
        Permission::create(['name' => 'category.update']);
        Permission::create(['name' => 'category.delete']);
        Permission::create(['name' => 'word.de.show']);
        Permission::create(['name' => 'word.de.create']);
        Permission::create(['name' => 'word.de.update']);
        Permission::create(['name' => 'word.de.delete']);
        Permission::create(['name' => 'word.en.show']);
        Permission::create(['name' => 'word.en.create']);
        Permission::create(['name' => 'word.en.update']);
        Permission::create(['name' => 'word.en.delete']);
        Permission::create(['name' => 'word.es.show']);
        Permission::create(['name' => 'word.es.create']);
        Permission::create(['name' => 'word.es.update']);
        Permission::create(['name' => 'word.es.delete']);
        Permission::create(['name' => 'word.pt.show']);
        Permission::create(['name' => 'word.pt.create']);
        Permission::create(['name' => 'word.pt.update']);
        Permission::create(['name' => 'word.pt.delete']);
        Permission::create(['name' => 'locale.show']);
        Permission::create(['name' => 'locale.create']);
        Permission::create(['name' => 'locale.update']);
        Permission::create(['name' => 'locale.delete']);
        Permission::create(['name' => 'pronoun.show']);
        Permission::create(['name' => 'pronoun.create']);
        Permission::create(['name' => 'pronoun.update']);
        Permission::create(['name' => 'pronoun.delete']);
        Permission::create(['name' => 'editor.background.show']);
        Permission::create(['name' => 'editor.background.create']);
        Permission::create(['name' => 'editor.background.update']);
        Permission::create(['name' => 'editor.background.delete']);
    }
}