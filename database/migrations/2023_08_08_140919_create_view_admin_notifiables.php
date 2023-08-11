<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        DB::unprepared("create view admin_notifiables as
        select distinct(users.id)
        from users, role_user, permission_role, permissions
        where permissions.name = 'admin.notifiable'
        and permissions.id = permission_role.permission_id
        and permission_role.role_id = role_user.role_id
        and users.id = role_user.user_id
        order by 1");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        DB::unprepared("drop view if exists admin_notifiables;");
    }
};