<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('words', function (Blueprint $table) {
            $table->unique(['category_id','word']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('words', function (Blueprint $table) {
            //
        });
    }
};