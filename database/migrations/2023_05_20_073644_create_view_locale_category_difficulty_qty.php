<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        DB::unprepared("create view locale_category_difficulty_qty(locale, category, difficulty, qty) 
        as select locales.locale, categories.category, words.difficult as difficulty, count(*) as qty
        from locales, categories, words
        where locales.id = categories.locale_id
        and categories.id = words.category_id
        group by locales.locale, categories.category, words.difficult
        order by locales.locale, categories.category, words.difficult");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        DB::unprepared("drop view if exists locale_category_difficulty_qty");
    }
};