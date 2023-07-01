<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('pronouns', function (Blueprint $table) {
            $table->id();
            /* locale_id: field 'id' from 'locales' */
            $table->string('pronoun')->default("");
            $table->enum('sex',['F','M','O'])->default("O");
            /* unique: locale_id, pronoun */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pronouns');
    }
};