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
        Schema::create('password_tokens', function (Blueprint $table) {
            $table->id();
            $table->string(User::MAIN_FIELD);  /* This is user_id from users. */
            $table->string('token');
            $table->boolean('is_used')->default(false);
            $table->timestamp('created_at');
            $table->index([User::MAIN_FIELD]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_tokens');
    }
};