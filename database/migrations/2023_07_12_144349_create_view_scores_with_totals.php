<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        DB::unprepared("create view scores_with_totals as
        select id, user_id, ' ' as isTotal, score, created_at, updated_at
        from scores
        union
        select null as id, user_id, 'TOTAL' as isTotal, sum(score), null as created_at, null as updated_at
        from scores
        group by user_id
        order by 2, 3, 1");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        DB::unprepared("drop view if exists scores_with_totals;");
    }
};