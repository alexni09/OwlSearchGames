<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void     {
        Schema::create('cardinals', function (Blueprint $table) {
            $table->unsignedTinyInteger('cardinal')->primary();
            $table->string('de')->default('');
            $table->string('en')->default('');
            $table->string('es')->default('');
            $table->string('pt')->default('');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cardinals');
    }
};