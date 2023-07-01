<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string('word');
            $table->boolean('difficult')->default(false);
            $table->timestamps();
            /* user_id: field 'id' from 'users' */
            /* category_id: field 'id' from 'categories' */
            /* unique: category_id, word */
            /* index: difficult, category_id */
            /* index: category_id */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('words');
    }
};