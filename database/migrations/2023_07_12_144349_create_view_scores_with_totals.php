<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        DB::unprepared("create view scores_with_totals as
        select scores.id, scores.user_id, locales.locale , ' ' as isTotal, scores.score, scores.created_at, scores.updated_at
        from scores, users, locales
        where scores.user_id = users.user_id
        and users.locale_id = locales.id
        union
        select null as id, scores.user_id, locales.locale, 'TOTAL' as isTotal, sum(scores.score), null as created_at, null as updated_at
        from scores, users, locales
        where scores.user_id = users.user_id
        and users.locale_id = locales.id
        group by user_id
        order by 2, 3, 4, 1");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        DB::unprepared("drop view if exists scores_with_totals;");
    }
};