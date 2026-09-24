<?php

namespace Database\Seeders;

use App\Models\CommunityMember;
use App\Models\Post;
use App\Models\TechFact;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@mykaeltech.com')->first();
        $demo = User::where('email', 'demo@mykaeltech.com')->first();

        $posts = [
            ['title' => 'How I structured my first Laravel 12 project', 'slug' => 'structuring-first-laravel-12-project', 'type' => 'learning_update', 'excerpt' => 'Actions over fat controllers, form requests everywhere, and why I stopped putting business logic in models.', 'content' => "Week 3 of learning Laravel in public.\n\nThree things that changed how I work this week:\n\n1. Actions over fat controllers — I extract each use-case into a single class. Controllers now just validate and delegate.\n2. Form Requests everywhere — validation rules live in their own classes and can be tested without HTTP.\n3. Lazy loading awareness — I got N+1'd on the community page and learned to love with().\n\nNext week: queues and jobs. The CV generator should really generate in the background.", 'user_id' => $demo?->id, 'is_published' => true],
            ['title' => 'Why bcrypt is still the default in 2026', 'slug' => 'why-bcrypt-still-default', 'type' => 'tech_fact', 'excerpt' => 'Argon2id is stronger on paper — so why does Laravel still default to bcrypt?', 'content' => "Argon2id won the Password Hashing Competition, yet bcrypt remains Laravel's default. The reason is boring and beautiful: bcrypt's implementation is battle-tested in every language and platform, its cost factor makes hardware attacks expensive, and timing characteristics are well understood.\n\nLaravel supports Argon2id out of the box — switch via config/hashing.php. For most apps, either choice beats what you'd write yourself.", 'user_id' => $admin?->id, 'is_published' => true],
            ['title' => 'Tutorial: Building a PDF CV generator with DomPDF', 'slug' => 'tutorial-pdf-cv-generator', 'type' => 'tutorial', 'excerpt' => 'From Blade template to downloadable CV in under an hour.', 'content' => "What we'll build: a member fills their profile, clicks download, and gets a typeset PDF.\n\nSteps:\n1. Install barryvdh/laravel-dompdf.\n2. Design a print-first Blade view — remember DomPDF's CSS support is roughly CSS 2.1: flexbox is limited, use tables or floats for layout-critical parts.\n3. Render with Pdf::loadHTML($view->render())->setPaper('a4').\n4. Stream with ->download('cv.pdf').\n\nGotcha: always inline your CSS — external stylesheets are not fetched.", 'user_id' => $admin?->id, 'is_published' => true],
            ['title' => 'MykaelTech platform goes live', 'slug' => 'platform-launch', 'type' => 'news', 'excerpt' => 'The community platform is live: join, build your CV, publish your learning updates.', 'content' => "Today we're shipping the new MykaelTech platform.\n\nWhat's inside:\n- Community membership with public profiles\n- A CV generator every member can use\n- A learning feed: updates, facts and tutorials\n- A full admin panel for content management\n\nThis replaces the original static site — same mission, new engine.", 'user_id' => $admin?->id, 'is_published' => true],
        ];
        foreach ($posts as $p) {
            Post::updateOrCreate(['slug' => $p['slug']], $p + ['published_at' => now()->subDays(rand(1, 20)), 'is_published' => true]);
        }

        $facts = [
            ['fact' => 'The first computer bug was an actual moth — found trapped in a relay of the Harvard Mark II in 1947. Grace Hopper taped it into the logbook.', 'source_url' => null, 'author' => 'Grace Hopper'],
            ['fact' => 'Git was written in about 10 days by Linus Torvalds in 2005 — as a temporary fix after BitKeeper revoked Linux\'s free license. It never left.', 'source_url' => null, 'author' => null],
            ['fact' => 'The "save" icon is a floppy disk because saving to one was once universal — and 3.5" floppies held just 1.44 MB, less than a single modern photo.', 'source_url' => null, 'author' => null],
            ['fact' => 'MySQL was named after co-founder Michael Widenius\'s daughter, My. The SQL part is the only technical bit of the name.', 'source_url' => null, 'author' => null],
            ['fact' => 'PHP originally stood for "Personal Home Page" — it now recursively means "PHP: Hypertext Preprocessor", and still powers roughly three-quarters of websites with a known server language.', 'source_url' => null, 'author' => null],
            ['fact' => 'Stack Overflow was almost named "DeveloperFusion". The founders chose the name after a vote — "we were trying to increase the level of programmer knowledge", Joel Spolsky said.', 'source_url' => null, 'author' => null],
            ['fact' => 'The first website ever (info.cern.ch, 1991) is still online today — and it explains what the World Wide Web is, because nobody knew yet.', 'source_url' => 'https://info.cern.ch', 'author' => null],
        ];
        foreach ($facts as $f) {
            TechFact::updateOrCreate(['fact' => $f['fact']], $f + ['published_at' => now()->subDays(rand(1, 30))]);
        }
    }
}
