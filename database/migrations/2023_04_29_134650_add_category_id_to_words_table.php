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
            $table->foreignId('category_id')->nullable()->default(null)->constrained()->restrictOnUpdate()->nullOnDelete();  /* This is field 'id' from 'categories' */
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