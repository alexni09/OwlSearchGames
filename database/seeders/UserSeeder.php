<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pronoun;
use App\Models\Locale;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $locale_en = Locale::getIdFromLocale('en');
        $locale_pt = Locale::getIdFromLocale('pt');
        $pronoun_id1 = Pronoun::getIdFromLocalePronoun($locale_pt,'Sr.');
        $pronoun_id2 = Pronoun::getIdFromLocalePronoun($locale_pt,'Dr.');
        $pronoun_id3 = Pronoun::getIdFromLocalePronoun($locale_pt,'Sra.');
        $pronoun_id4 = Pronoun::getIdFromLocalePronoun($locale_pt,'Srta.');
        $pronoun_id5 = Pronoun::getIdFromLocalePronoun($locale_en,'Mr.');
        $pronoun_id6 = Pronoun::getIdFromLocalePronoun($locale_en,'Mrs.');
        
        $admin = User::create([
            User::MAIN_FIELD => 'anonymous',
            User::PASSWORD_FIELD => '$2y$10$D2BjRGGEbSUwef7oWu5Lcus.Xq.Jw84Wd6zFdvbko3dtjk4Qrdx9S',
            'name' => 'Anonymous',
            'email' => 'anonymous@anonymous.co.yz',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'locale_id' => $locale_pt,
            'pronoun_id' => $pronoun_id1
        ]);
        $admin->roles()->attach(Role::where('name','admin')->value('id'));
        
        $manel = User::create([
            User::MAIN_FIELD => 'manel',
            User::PASSWORD_FIELD => '$2y$10$D2BjRGGEbSUwef7oWu5Lcus.Xq.Jw84Wd6zFdvbko3dtjk4Qrdx9S',
            'name' => 'José Manelsohn da Silva',
            'email' => 'manel@manel.biz.qq',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'locale_id' => $locale_pt,
            'pronoun_id' => $pronoun_id2
        ]);
        $manel->roles()->attach(Role::where('name','user.generic')->value('id'));

        $maria = User::create([
            User::MAIN_FIELD => 'maria',
            User::PASSWORD_FIELD => '$2y$10$D2BjRGGEbSUwef7oWu5Lcus.Xq.Jw84Wd6zFdvbko3dtjk4Qrdx9S',
            'name' => 'Maria de Fatima',
            'email' => 'maria@maria.com.yy',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'locale_id' => $locale_pt,
            'pronoun_id' => $pronoun_id3
        ]);
        $maria->roles()->attach(Role::where('name','editor.en')->value('id'));
        $maria->roles()->attach(Role::where('name','editor.es')->value('id'));
        $maria->roles()->attach(Role::where('name','editor.pt')->value('id'));
        $maria->roles()->attach(Role::where('name','user.generic')->value('id'));

        $rodrigo = User::create([
            User::MAIN_FIELD => 'rodrigo',
            User::PASSWORD_FIELD => '$2y$10$D2BjRGGEbSUwef7oWu5Lcus.Xq.Jw84Wd6zFdvbko3dtjk4Qrdx9S',
            'name' => 'Rodrigo',
            'email' => 'rodrigo@rodrigo.com.zz',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'locale_id' => $locale_pt,
            'pronoun_id' => $pronoun_id2
        ]);
        $rodrigo->roles()->attach(Role::where('name','editor.de')->value('id'));
        $rodrigo->roles()->attach(Role::where('name','user.generic')->value('id'));

        $amanda = User::create([
            User::MAIN_FIELD => 'amanda',
            User::PASSWORD_FIELD => '$2y$10$D2BjRGGEbSUwef7oWu5Lcus.Xq.Jw84Wd6zFdvbko3dtjk4Qrdx9S',
            'name' => 'Amanda',
            'email' => 'amanda@amanda.biz',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'locale_id' => $locale_pt,
            'pronoun_id' => $pronoun_id4
        ]);
        $amanda->roles()->attach(Role::where('name','editor.en')->value('id'));
        $amanda->roles()->attach(Role::where('name','editor.pt')->value('id'));
        $amanda->roles()->attach(Role::where('name','user.generic')->value('id'));

        $smith = User::create([
            User::MAIN_FIELD => 'smith',
            User::PASSWORD_FIELD => '$2y$10$D2BjRGGEbSUwef7oWu5Lcus.Xq.Jw84Wd6zFdvbko3dtjk4Qrdx9S',
            'name' => 'John Smith',
            'email' => 'smith@smith.my.zz',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'locale_id' => $locale_en,
            'pronoun_id' => $pronoun_id5
        ]);
        $smith->roles()->attach(Role::where('name','user.generic')->value('id'));
        $smith->roles()->attach(Role::where('name','user.advanced')->value('id'));

    }
}