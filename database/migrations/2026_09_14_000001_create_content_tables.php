<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('site_settings')) {
            Schema::create('site_settings', function (Blueprint $table) {
                $table->id();
                $table->string('key')->unique();
                $table->text('value')->nullable();
                $table->string('group')->default('general')->index();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('services')) {
            Schema::create('services', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->string('icon')->nullable();
                $table->text('short_description')->nullable();
                $table->longText('description')->nullable();
                $table->json('features')->nullable();
                $table->unsignedInteger('sort_order')->default(0);
                $table->boolean('is_active')->default(true)->index();
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('projects')) {
            Schema::create('projects', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->text('short_description')->nullable();
                $table->longText('description')->nullable();
                $table->string('image_path')->nullable();
                $table->json('tech_stack')->nullable();
                $table->string('external_url')->nullable();
                $table->string('github_url')->nullable();
                $table->string('demo_url')->nullable();
                $table->string('category')->nullable()->index();
                $table->boolean('is_featured')->default(false)->index();
                $table->boolean('is_active')->default(true)->index();
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('team_members')) {
            Schema::create('team_members', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('role');
                $table->text('bio')->nullable();
                $table->string('image_path')->nullable();
                $table->string('email')->nullable();
                $table->string('linkedin_url')->nullable();
                $table->string('github_url')->nullable();
                $table->string('twitter_url')->nullable();
                $table->boolean('is_active')->default(true)->index();
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (! Schema::hasTable('testimonials')) {
            Schema::create('testimonials', function (Blueprint $table) {
                $table->id();
                $table->string('author_name');
                $table->string('author_role')->nullable();
                $table->text('content');
                $table->string('company')->nullable();
                $table->unsignedTinyInteger('rating')->default(5);
                $table->boolean('is_active')->default(true)->index();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('team_members');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('services');
        Schema::dropIfExists('site_settings');
    }
};
