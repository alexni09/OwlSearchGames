<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\Permission;

class RoleSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $admin = Role::create(['name' => 'admin']);
        $admin->permissions()->attach(Permission::whereNotIn('name', ['admin.updatedb','profile.delete','trophy.donor','trophy.gold'])->get()->pluck('id'));

        $adminSpecial = Role::create(['name' => 'admin.special']);
        $adminSpecial->permissions()->attach(Permission::where('name', 'admin.updatedb')->get()->pluck('id'));

        $userRestricted = Role::create(['name' => 'user.restricted']);
        $userRestricted->permissions()->attach(Permission::where('name', 'profile.delete')->get()->pluck('id'));

        $userGeneric = Role::create(['name' => 'user.generic']);
        $userGeneric->permissions()->attach(Permission::where('name', 'profile.delete')->get()->pluck('id'));
        $userGeneric->permissions()->attach(Permission::where('name', 'profile.update')->get()->pluck('id'));
        $userGeneric->permissions()->attach(Permission::where('name', 'password.update')->get()->pluck('id'));

        $userAdvanced = Role::create(['name' => 'user.advanced']);
        $userAdvanced->permissions()->attach(Permission::where('name', 'main.difficulty.verydifficult')->get()->pluck('id'));
        $userAdvanced->permissions()->attach(Permission::where('name', 'background.advanced')->get()->pluck('id'));
        $userAdvanced->permissions()->attach(Permission::where('name', 'vocabulary.advanced')->get()->pluck('id'));
        $userAdvanced->permissions()->attach(Permission::where('name', 'trophy.silver')->get()->pluck('id'));

        $userPremiumPromo = Role::create(['name' => 'user.premium.promo']);
        $userPremiumPromo->permissions()->attach(Permission::where('name', 'main.difficulty.insane')->get()->pluck('id'));
        $userPremiumPromo->permissions()->attach(Permission::where('name', 'background.premium')->get()->pluck('id'));
        $userPremiumPromo->permissions()->attach(Permission::where('name', 'vocabulary.premium')->get()->pluck('id'));
        $userPremiumPromo->permissions()->attach(Permission::where('name', 'trophy.gold')->get()->pluck('id'));
        $userPremiumPromo->permissions()->attach(Permission::where('name', 'main.allcontrols')->get()->pluck('id'));

        $userPremium = Role::create(['name' => 'user.premium']);
        $userPremium->permissions()->attach(Permission::where('name', 'main.difficulty.insane')->get()->pluck('id'));
        $userPremium->permissions()->attach(Permission::where('name', 'background.premium')->get()->pluck('id'));
        $userPremium->permissions()->attach(Permission::where('name', 'vocabulary.premium')->get()->pluck('id'));
        $userPremium->permissions()->attach(Permission::where('name', 'trophy.gold')->get()->pluck('id'));

        $purchasedAdvanced = Role::create(['name' => 'purchased.advanced']);
        $purchasedAdvanced->permissions()->attach(Permission::where('name', 'main.difficulty.verydifficult')->get()->pluck('id'));
        $purchasedAdvanced->permissions()->attach(Permission::where('name', 'background.advanced')->get()->pluck('id'));
        $purchasedAdvanced->permissions()->attach(Permission::where('name', 'vocabulary.advanced')->get()->pluck('id'));

        $purchasedPremium = Role::create(['name' => 'purchased.premium']);
        $purchasedPremium->permissions()->attach(Permission::where('name', 'main.difficulty.verydifficult')->get()->pluck('id'));
        $purchasedPremium->permissions()->attach(Permission::where('name', 'main.difficulty.insane')->get()->pluck('id'));
        $purchasedPremium->permissions()->attach(Permission::where('name', 'background.advanced')->get()->pluck('id'));
        $purchasedPremium->permissions()->attach(Permission::where('name', 'background.premium')->get()->pluck('id'));
        $purchasedPremium->permissions()->attach(Permission::where('name', 'vocabulary.advanced')->get()->pluck('id'));
        $purchasedPremium->permissions()->attach(Permission::where('name', 'vocabulary.premium')->get()->pluck('id'));
        $purchasedPremium->permissions()->attach(Permission::where('name', 'main.allcontrols')->get()->pluck('id'));

        $purchasedDonor = Role::create(['name' => 'purchased.donor']);
        $purchasedDonor->permissions()->attach(Permission::where('name', 'trophy.donor')->get()->pluck('id'));

        $editorDe = Role::create(['name' => 'editor.de']);
        $editorDe->permissions()->attach(Permission::where('name', 'category.show')->get()->pluck('id'));
        $editorDe->permissions()->attach(Permission::whereRaw("name like 'word.de%'")->get()->pluck('id'));

        $editorEs = Role::create(['name' => 'editor.es']);
        $editorEs->permissions()->attach(Permission::where('name', 'category.show')->get()->pluck('id'));
        $editorEs->permissions()->attach(Permission::whereRaw("name like 'word.es%'")->get()->pluck('id'));

        $editorEn = Role::create(['name' => 'editor.en']);
        $editorEn->permissions()->attach(Permission::where('name', 'category.show')->get()->pluck('id'));
        $editorEn->permissions()->attach(Permission::whereRaw("name like 'word.en%'")->get()->pluck('id'));

        $editorPt = Role::create(['name' => 'editor.pt']);
        $editorPt->permissions()->attach(Permission::where('name', 'category.show')->get()->pluck('id'));
        $editorPt->permissions()->attach(Permission::whereRaw("name like 'word.pt%'")->get()->pluck('id'));

        $editorBackground = Role::create(['name' => 'editor.background']);
        $editorBackground->permissions()->attach(Permission::whereRaw("name like 'background%'")->get()->pluck('id'));
        $editorBackground->permissions()->attach(Permission::whereRaw("name like 'editor.background%'")->get()->pluck('id'));
    }
}