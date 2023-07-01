<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        DB::unprepared("create view word_duplicates(word, locale, category) 
        as select words.word, locales.locale, categories.category
        from locales, categories, words
        where locales.id = categories.locale_id
        and categories.id = words.category_id
        and words.word in (
          select a.word
          from words a
          where exists (
            select b.word
            from words b
            where a.word = b.word
            and a.category_id <> b.category_id
          )
        )
        group by words.word, locales.locale, categories.category
        order by 1,2,3");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        DB::unprepared("drop view if exists word_duplicates");
    }
};