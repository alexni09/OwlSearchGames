<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
/* User's main field */
use App\Models\User;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        $min = User::MAIN_FIELD_MIN_CHARS - 2;
        $max = User::MAIN_FIELD_MAX_CHARS - 2;
        $st = "'^[a-z][a-z|0-9|\.|\_]{". strval($min) . "," . strval($max) . "}[a-z|0-9]$'";
        DB::unprepared("create trigger length_update_trigger_" . User::MAIN_FIELD . "_users before update on users
        for each row
        begin
        if NOT REGEXP_LIKE(new." . User::MAIN_FIELD . ", " . $st . ", 'c') or 
        CHAR_LENGTH(new.name) > " . strval(User::NAME_FIELD_MAX_CHARS) . " or 
        CHAR_LENGTH(new.email) > " . strval(User::EMAIL_FIELD_MAX_CHARS) . " or
        ((old." . User::MAIN_FIELD . " != new." . User::MAIN_FIELD . ") and
        new." . User::MAIN_FIELD . " in ( select " . User::MAIN_FIELD . " from user_updates where operation = 'D' )) then
        set new." . User::MAIN_FIELD . " = null;
        end if;
        end;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        DB::unprepared("drop trigger length_update_trigger_" . User::MAIN_FIELD . "_users;");
    }
};