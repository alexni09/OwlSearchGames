<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('deleted_role_users', function (Blueprint $table) {
            $table->string('user_id'); /* This is field 'user_id' from 'users'. */
            $table->foreignId('role_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete(); /* This is field 'id' from 'roles'. */
            $table->timestamp('created_at')->nullable()->default(null);
            $table->primary(['user_id','role_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deleted_role_users');
    }
};