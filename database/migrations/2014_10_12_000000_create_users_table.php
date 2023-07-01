<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/* User's main field */
use App\Models\User;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string(User::MAIN_FIELD)->unique();
            $table->unsignedTinyInteger(User::STATUS_FIELD)->default(User::STATUS_FIELD_ACTIVE);
            $table->string(User::PASSWORD_FIELD);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('show_pronoun')->default(true);
            $table->boolean('show_name')->default(true);
            $table->boolean('show_user_id')->default(true);
            $table->boolean('show_email')->default(true);
            $table->rememberToken();
            $table->timestamps();
            /* locale_id: field 'id' from 'locales' */
            /* pronoun_id: field 'id' from 'pronouns' */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};