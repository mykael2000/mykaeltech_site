<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Bring databases created from the original legacy migrations up to
     * the schema expected by the current models and seeders. This is
     * intentionally additive and idempotent so existing data is preserved.
     */
    public function up(): void
    {
        if (Schema::hasTable('services')) {
            if (! Schema::hasColumn('services', 'category')) {
                Schema::table('services', function (Blueprint $table) {
                    $table->string('category', 191)->nullable()->index();
                });
            }
            if (! Schema::hasColumn('services', 'excerpt')) {
                Schema::table('services', function (Blueprint $table) {
                    $table->text('excerpt')->nullable();
                });
            }
            if (! Schema::hasColumn('services', 'starting_price')) {
                Schema::table('services', function (Blueprint $table) {
                    $table->string('starting_price')->nullable();
                });
            }
            if (! Schema::hasColumn('services', 'is_featured')) {
                Schema::table('services', function (Blueprint $table) {
                    $table->boolean('is_featured')->default(false)->index();
                });
            }
        }

        if (Schema::hasTable('projects')) {
            if (! Schema::hasColumn('projects', 'icon')) {
                Schema::table('projects', function (Blueprint $table) {
                    $table->string('icon')->nullable();
                });
            }
            if (! Schema::hasColumn('projects', 'excerpt')) {
                Schema::table('projects', function (Blueprint $table) {
                    $table->text('excerpt')->nullable();
                });
            }
            if (! Schema::hasColumn('projects', 'cover_photo')) {
                Schema::table('projects', function (Blueprint $table) {
                    $table->string('cover_photo')->nullable();
                });
            }
            if (! Schema::hasColumn('projects', 'technologies')) {
                Schema::table('projects', function (Blueprint $table) {
                    $table->json('technologies')->nullable();
                });
            }
            if (! Schema::hasColumn('projects', 'link')) {
                Schema::table('projects', function (Blueprint $table) {
                    $table->string('link')->nullable();
                });
            }
            if (! Schema::hasColumn('projects', 'repo_url')) {
                Schema::table('projects', function (Blueprint $table) {
                    $table->string('repo_url')->nullable();
                });
            }
            if (! Schema::hasColumn('projects', 'image')) {
                Schema::table('projects', function (Blueprint $table) {
                    $table->string('image')->nullable();
                });
            }
            if (! Schema::hasColumn('projects', 'status')) {
                Schema::table('projects', function (Blueprint $table) {
                    $table->string('status', 191)->nullable()->index();
                });
            }
            if (! Schema::hasColumn('projects', 'duration')) {
                Schema::table('projects', function (Blueprint $table) {
                    $table->string('duration')->nullable();
                });
            }
            if (! Schema::hasColumn('projects', 'challenges')) {
                Schema::table('projects', function (Blueprint $table) {
                    $table->text('challenges')->nullable();
                });
            }
        }

        if (Schema::hasTable('team_members')) {
            if (! Schema::hasColumn('team_members', 'photo_path')) {
                Schema::table('team_members', function (Blueprint $table) {
                    $table->string('photo_path')->nullable();
                });
            }
            if (! Schema::hasColumn('team_members', 'photo')) {
                Schema::table('team_members', function (Blueprint $table) {
                    $table->string('photo')->nullable();
                });
            }
        }

        if (Schema::hasTable('testimonials')) {
            if (! Schema::hasColumn('testimonials', 'author_name')) {
                Schema::table('testimonials', function (Blueprint $table) {
                    $table->string('author_name')->nullable();
                });
            }
            if (! Schema::hasColumn('testimonials', 'author_role')) {
                Schema::table('testimonials', function (Blueprint $table) {
                    $table->string('author_role')->nullable();
                });
            }
            if (! Schema::hasColumn('testimonials', 'name')) {
                Schema::table('testimonials', function (Blueprint $table) {
                    $table->string('name')->nullable();
                });
            }
            if (! Schema::hasColumn('testimonials', 'role')) {
                Schema::table('testimonials', function (Blueprint $table) {
                    $table->string('role')->nullable();
                });
            }
            if (! Schema::hasColumn('testimonials', 'content')) {
                Schema::table('testimonials', function (Blueprint $table) {
                    $table->text('content')->nullable();
                });
            }
            if (! Schema::hasColumn('testimonials', 'quote')) {
                Schema::table('testimonials', function (Blueprint $table) {
                    $table->text('quote')->nullable();
                });
            }
            if (! Schema::hasColumn('testimonials', 'sort_order')) {
                Schema::table('testimonials', function (Blueprint $table) {
                    $table->unsignedInteger('sort_order')->default(0);
                });
            }
        }

        if (Schema::hasTable('posts') && ! Schema::hasColumn('posts', 'is_published')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->boolean('is_published')->default(true)->index();
            });
        }

        if (Schema::hasTable('tech_facts') && ! Schema::hasColumn('tech_facts', 'author')) {
            Schema::table('tech_facts', function (Blueprint $table) {
                $table->string('author')->nullable();
            });
        }

        foreach (['experiences', 'educations', 'certifications'] as $tableName) {
            if (Schema::hasTable($tableName) && ! Schema::hasColumn($tableName, 'sort_order')) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->unsignedInteger('sort_order')->default(0);
                });
            }
        }

        if (! Schema::hasTable('badges')) {
            Schema::create('badges', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug', 191)->unique();
                $table->text('description')->nullable();
                $table->string('icon')->nullable();
                $table->string('color')->nullable();
                $table->string('badge_type')->nullable();
                $table->unsignedInteger('order_index')->default(0);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Intentionally left empty: repair columns are also part of the
        // fresh-install schema, so dropping them here would break rollbacks.
    }
};
