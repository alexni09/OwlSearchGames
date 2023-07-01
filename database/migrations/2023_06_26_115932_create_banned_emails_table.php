<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('banned_emails', function (Blueprint $table) {
            $table->id();
            $table->string('part');
            $table->unsignedTinyInteger('operation')->default(2); /* 1 = equal; 2 = contains */
            $table->timestamp('created_at');
            $table->unique(['operation','part']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banned_emails');
    }
};