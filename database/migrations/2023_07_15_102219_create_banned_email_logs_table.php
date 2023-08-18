<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('banned_email_logs', function (Blueprint $table) {
            $table->id();
            $table->string('part');
            $table->unsignedTinyInteger('operation')->default(0); /* 0 = not yet sent; 1 = sending; 2 = sent */
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
        Schema::dropIfExists('banned_email_logs');
    }
};