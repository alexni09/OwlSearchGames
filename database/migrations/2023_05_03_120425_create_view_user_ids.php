<?php
/*
    Contains the active and deleted user_id's.
*/
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
/* User's main field */
use App\Models\User;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        DB::unprepared("create view " . User::MAIN_FIELD . "s(" . User::MAIN_FIELD . ")
        as select distinct " . User::MAIN_FIELD . " from users
        union
        select distinct " . User::MAIN_FIELD . " from user_updates
        where operation = 'D';");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        DB::unprepared("drop view if exists " . User::MAIN_FIELD . "s;");
    }
};