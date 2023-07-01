<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        DB::unprepared("create view locale_category_difficulty_word_size_qty(locale, category, difficulty, ws, word_size, qty) 
        as select locales.locale, categories.category, words.difficult as difficulty, 3 as ws, '3 or less' as word_size, count(*) as qty
        from locales, categories, words
        where locales.id = categories.locale_id
        and categories.id = words.category_id
        and CHAR_LENGTH(words.word) <= 3
        group by locales.locale, categories.category, words.difficult
        union all
        select locales.locale, categories.category, words.difficult as difficulty, CHAR_LENGTH(words.word) as ws, cardinals.en as word_size, count(*) as qty
        from locales, categories, words, cardinals
        where locales.id = categories.locale_id
        and categories.id = words.category_id
        and cardinals.cardinal = CHAR_LENGTH(words.word)
        and CHAR_LENGTH(words.word) between 4 and 11
        group by locales.locale, categories.category, words.difficult, CHAR_LENGTH(words.word), cardinals.en
        union all
        select locales.locale, categories.category, words.difficult as difficulty, 12 as ws, '12 or more' as word_size, count(*) as qty
        from locales, categories, words
        where locales.id = categories.locale_id
        and categories.id = words.category_id
        and CHAR_LENGTH(words.word) >= 12
        group by locales.locale, categories.category, words.difficult
        order by 1,2,3,4");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        DB::unprepared("drop view if exists locale_category_difficulty_word_size_qty");
    }
};