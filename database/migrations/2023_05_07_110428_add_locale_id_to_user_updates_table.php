<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('user_updates', function (Blueprint $table) {
            $table->foreignId('locale_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete(); /* This is field 'id' from 'locales' */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_updates', function (Blueprint $table) {
            //
        });
    }
};