<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('categories', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->default(null)->constrained()->restrictOnUpdate()->nullOnDelete();  /* This is field 'id' from 'users'. */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
};