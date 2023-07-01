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
        DB::unprepared("drop view if exists " . User::MAIN_FIELD . "s;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        //
    }
};