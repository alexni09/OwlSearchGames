<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->string(User::MAIN_FIELD);  /*  This is field 'user_id' from 'users'.  */
            $table->tinyInteger('difficultyLevel');  /*  0, 1, 2, 3, 4;  for now.  */ 
            $table->smallInteger('difficulty');
            $table->unsignedBigInteger('score')->nullable()->default(null);
            $table->timestamps();
            $table->index([User::MAIN_FIELD,'score']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};