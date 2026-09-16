<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * The sessions table is created by the 0001_01_01_000000_create_users_table
     * migration on fresh installations. Databases that were migrated before the
     * sessions table was added to that migration (for example an already deployed
     * production database) will not have the table, and Laravel will not re-run
     * the users migration because it is already recorded as migrated.
     *
     * This migration safely creates the table whenever it is missing.
     */
    public function up(): void
    {
        if (Schema::hasTable('sessions')) {
            return;
        }

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Intentionally left empty. The sessions table is also managed by the
        // users table migration, so dropping it here could break the app.
    }
};