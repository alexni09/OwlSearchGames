<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        DB::unprepared("drop view if exists locale_category_difficulty_qty");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        //
    }
};