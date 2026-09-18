<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('users', 'is_admin')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('is_admin')->default(false)->after('password');
            });
        }
    }

    public function down(): void
    {
        // Intentionally left empty. On fresh installations the users table
        // migration already creates the is_admin column (with the
        // users_is_admin_index index), so this migration's up() is a no-op
        // there. Dropping the column unconditionally would break the index
        // created by the users table migration on SQLite.
    }
};
