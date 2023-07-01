<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/* User's main field */
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_updates', function (Blueprint $table) {
            $table->id();
            /* 'D': deleted; 'U': an update; 'E': an undelete; 'R': a successful reinstate */
            $table->enum('operation',['D','E','U','R'])->default('U'); 
            $table->unsignedBigInteger('old_id')->default(0);
            $table->string(User::MAIN_FIELD);
            $table->unsignedTinyInteger(User::STATUS_FIELD)->default(User::STATUS_FIELD_ACTIVE);
            $table->string(User::PASSWORD_FIELD);
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable()->default(null);
            $table->boolean('show_pronoun')->default(true);
            $table->boolean('show_name')->default(true);
            $table->boolean('show_user_id')->default(true);
            $table->boolean('show_email')->default(true);
            $table->timestamp('created_at')->nullable()->default(null);
            /* locale_id: field 'id' from 'locales' */
            /* pronoun_id: field 'id' from 'pronouns' */
            $table->index('old_id');
            $table->index('operation',User::MAIN_FIELD);
            $table->index(User::MAIN_FIELD);
            $table->index('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_updates');
    }
};