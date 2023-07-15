<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('banned_user_id_logs', function (Blueprint $table) {
            $table->id();
            $table->string('part');
            $table->unsignedTinyInteger('operation')->default(0); /* 0 = unspecified; 1 = registration; 2 = profile update */
            $table->string('ip')->nullable()->default(null);
            $table->boolean('isDisplayed')->default(false);  /* for future use */
            $table->timestamp('created_at');
            $table->index(['part']);
            $table->index(['ip', 'part', 'operation']);
            $table->index(['isDisplayed']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banned_user_id_logs');
    }
};