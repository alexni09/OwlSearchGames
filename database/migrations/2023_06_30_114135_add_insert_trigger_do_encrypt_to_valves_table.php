<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Models\Valve;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        DB::unprepared("create trigger encrypt_insert_trigger_valves before insert on valves
        for each row
        begin
        set new.this_encrypted = aes_encrypt(new.this_value, '" . Valve::MY_KEY . "');
        set new.this_value = null;
        end;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        DB::unprepared("drop trigger encrypt_insert_trigger_valves;");
    }
};