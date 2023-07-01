<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
/* A word's minimum length */
use App\Models\Word;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        DB::unprepared("create trigger insert_trigger_word_words before insert on words
        for each row
        begin
        if NOT CHAR_LENGTH(new.word) >= " . strval(Word::MIN_WORD_LENGTH) . " then
        set new.word = null;
        end if;
        end;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        DB::unprepared("drop trigger length_insert_trigger_word_words;");
    }
};