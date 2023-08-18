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
            $table->unsignedTinyInteger('status')->default(2);   /* 0 = not yet sent; 1 = sending; 2 = sent */
            $table->string('ip')->nullable()->default(null);
            $table->timestamp('created_at');
            $table->index(['part']);
            $table->index(['ip']);
            $table->index(['status', 'ip', 'part']);
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