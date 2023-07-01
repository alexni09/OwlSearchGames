<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('img')->unique();  /* Relative to WordSearchGame::BASE_DIR */
            $table->string('background_position')->default('center');
            $table->string('description')->nullable()->default(null)->invisible();
            /* permission_id */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backgrounds');
    }
};