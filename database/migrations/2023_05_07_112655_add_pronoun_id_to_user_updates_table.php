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
            $table->foreignId('pronoun_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete(); /* This is field 'id' from 'pronouns' */
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