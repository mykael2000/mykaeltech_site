<?php

namespace Database\Seeders;

use App\Models\CommunityMember;
use App\Models\Event;
use App\Models\NewsletterSubscriber;
use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\TechFact;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ---------- Users ----------
        $admin = User::create([
            'name' => 'Mykael Oduya',
            'email' => 'admin@mykaeltech.com',
            'password' => Hash::make('ChangeMe123!'),
            'is_admin' => true,
        ]);

        $demo = User::create([
            'name' => 'Aisha Developer',
            'email' => 'demo@mykaeltech.com',
            'password' => Hash::make('password'),
        ]);

        CommunityMember::create([
            'user_id' => $admin->id,
            'username' => 'mykael',
            'headline' => 'Founder & CEO — bridging technology and accounting',
            'bio' => 'Founder of MykaelTech, building tech solutions and growing a community of learners and builders.',
            'skills' => ['Leadership', 'Software Architecture', 'FinTech', 'Community Building'],
            'company' => 'MykaelTech',
            'location' => 'Nairobi, Kenya',
            'linkedin_url' => 'https://linkedin.com/company/mykaeltech',
            'website_url' => 'https://mykaeltech.com',
            'is_public' => true,
        ]);

        CommunityMember::create([
            'user_id' => $demo->id,
            'username' => 'aisha',
            'headline' => 'Full-stack developer learning in public',
            'bio' => 'Community member passionate about Laravel, Tailwind and shipping side projects.',
            'skills' => ['PHP', 'Laravel', 'Tailwind', 'MySQL'],
            'location' => 'Mombasa, Kenya',
            'github_url' => 'https://github.com',
            'is_public' => true,
        ]);

        NewsletterSubscriber::create(['email' => 'hello@example.com']);

        // ---------- Site settings ----------
        $settings = [
            'general.site_name' => 'MykaelTech',
            'general.tagline' => 'Tech solutions, community and careers',
            'general.hero_badge' => 'Tech community · Kenya & remote',
            'general.hero_title' => 'Build your future in tech',
            'general.hero_subtitle' => 'MykaelTech delivers software services, showcases real projects, and grows a community where learning never stops. Join 500+ members learning and building together.',
            'general.about_text' => 'MykaelTech is a technology company founded by Mykael Oduya to bridge technology and accounting. We provide digital services, mentor emerging talent, and run a community where members learn in public, share updates and grow together.',
            'general.contact_email' => 'hello@mykaeltech.com',
            'general.contact_phone' => '+254 700 000 000',
            'general.contact_address' => 'Nairobi, Kenya — remote worldwide',
            'general.social.facebook_url' => 'https://facebook.com',
            'general.social.twitter_url' => 'https://x.com',
            'general.social.linkedin_url' => 'https://linkedin.com/company/mykaeltech',
            'general.social.github_url' => 'https://github.com',
            'general.footer_text' => 'Bridging technology and community — learning never stops.',
            'general.stats_members' => '500',
            'general.stats_projects' => '15',
            'general.stats_clients' => '20',
            'general.stats_events' => '12',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::create(['key' => $key, 'value' => $value, 'group' => 'general']);
        }

        // ---------- Services (migrated from legacy site) ----------
        $services = [
            ['title' => 'Web Development', 'icon' => '🌐', 'slug' => 'web-development',
             'short_description' => 'Modern, responsive websites and web apps built with cutting-edge technologies.',
             'description' => 'From corporate sites to complex web applications — we design and build fast, secure and scalable digital products tailored to your business needs.',
             'features' => ['Custom web applications', 'E-commerce solutions', 'CMS & blogs', 'API development', 'Performance optimization']],
            ['title' => 'Mobile App Development', 'icon' => '📱', 'slug' => 'mobile-app-development',
             'short_description' => 'Cross-platform mobile apps that feel native on both iOS and Android.',
             'description' => 'We ship cross-platform mobile applications with smooth UX, offline capability and clean architecture.',
             'features' => ['iOS & Android', 'Progressive Web Apps', 'Push notifications', 'App store deployment']],
            ['title' => 'UI/UX Design', 'icon' => '🎨', 'slug' => 'ui-ux-design',
             'short_description' => 'User-centered design that converts visitors into customers.',
             'description' => 'Research-driven interfaces: wireframes, prototypes and polished design systems for web and mobile.',
             'features' => ['User research', 'Wireframing & prototyping', 'Design systems', 'Usability testing']],
            ['title' => 'Cloud Solutions', 'icon' => '☁️', 'slug' => 'cloud-solutions',
             'short_description' => 'Scalable cloud architecture, migrations and DevOps automation.',
             'description' => 'We move your infrastructure to the cloud and automate deployments, monitoring and backups.',
             'features' => ['Cloud migration', 'CI/CD pipelines', 'Server management', 'Backup & recovery']],
            ['title' => 'Tech Consulting & Training', 'icon' => '🧠', 'slug' => 'tech-consulting-training',
             'short_description' => 'Strategic guidance and hands-on training for teams and individuals.',
             'description' => 'Advisory on tech stack decisions, digital transformation and structured training programs — including community-led learning.',
             'features' => ['Technology audits', 'Team training', 'Career mentorship', 'Workshops & bootcamps']],
            ['title' => 'Maintenance & Support', 'icon' => '🛠️', 'slug' => 'maintenance-support',
             'short_description' => 'Keep your products secure, updated and running smoothly.',
             'description' => 'Ongoing maintenance plans: security patches, upgrades, monitoring and rapid support.',
             'features' => ['Security monitoring', 'Regular updates', 'Uptime monitoring', 'Priority support']],
        ];

        foreach ($services as $i => $s) {
            Service::create($s + ['sort_order' => $i]);
        }

        // ---------- Projects ----------
        $projects = [
            ['title' => 'MykaelTech Community Platform', 'slug' => 'community-platform', 'category' => 'Web App',
             'short_description' => 'The platform you are on: community, learning hub and CV generator in one.',
             'description' => 'A Laravel-powered platform where members join a tech community, publish learning updates, access a curated facts feed, showcase portfolios and generate professional CVs on demand.',
             'tech_stack' => ['Laravel 12', 'Tailwind CSS', 'Filament', 'MySQL'], 'is_featured' => true, 'demo_url' => 'https://mykaeltech.com'],
            ['title' => 'E-Commerce Storefront', 'slug' => 'ecommerce-storefront', 'category' => 'E-Commerce',
             'short_description' => 'A fast, conversion-focused online store with payment integration.',
             'description' => 'Full-featured e-commerce solution with cart, checkout, M-Pesa and card payments, inventory management and an analytics dashboard.',
             'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'M-Pesa API'], 'is_featured' => true],
            ['title' => 'FinTrack Dashboard', 'slug' => 'fintrack-dashboard', 'category' => 'Web App',
             'short_description' => 'Financial tracking dashboard bridging accounting and technology.',
             'description' => 'Real-time expense and revenue tracking with automated report generation, built for small businesses.',
             'tech_stack' => ['Laravel', 'Chart.js', 'Tailwind CSS'], 'is_featured' => true],
            ['title' => 'School Management System', 'slug' => 'school-management', 'category' => 'Web App',
             'short_description' => 'Students, fees, exams and communication in a single platform.',
             'description' => 'Complete school administration: admissions, attendance, grading, fee tracking and parent SMS notifications.',
             'tech_stack' => ['PHP', 'MySQL', 'Bootstrap'], 'is_featured' => false],
            ['title' => 'Logistics Tracker', 'slug' => 'logistics-tracker', 'category' => 'Web App',
             'short_description' => 'Fleet and delivery tracking with live status updates.',
             'description' => 'Real-time delivery tracking platform with driver mobile app, route optimization and customer notifications.',
             'tech_stack' => ['Laravel', 'Flutter', 'Redis'], 'is_featured' => false],
        ];

        foreach ($projects as $i => $p) {
            Project::create($p + ['sort_order' => $i, 'is_active' => true]);
        }

        // ---------- Team ----------
        TeamMember::create([
            'name' => 'Mykael Oduya', 'role' => 'Founder & CEO',
            'bio' => 'Bridging technology and accounting. Passionate about building products and people.',
            'email' => 'admin@mykaeltech.com', 'linkedin_url' => 'https://linkedin.com/company/mykaeltech', 'sort_order' => 0,
        ]);

        // ---------- Testimonials ----------
        $testimonials = [
            ['author_name' => 'Sarah Kimani', 'author_role' => 'Operations Manager', 'company' => 'RetailChain Ltd',
             'content' => 'MykaelTech rebuilt our entire storefront. Sales are up 40% and the site loads instantly. Truly professional work.'],
            ['author_name' => 'David Otieno', 'author_role' => 'Small Business Owner', 'company' => 'FinTrack user',
             'content' => 'The FinTrack dashboard gave me clarity on my business finances for the first time. Worth every shilling.'],
            ['author_name' => 'Grace Wanjiru', 'author_role' => 'Community Member', 'company' => null,
             'content' => 'I joined the community to learn Laravel. Six months later I landed my first developer job — the learning updates and mentorship made the difference.'],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create($t);
        }

        // ---------- Posts (learning hub) ----------
        $posts = [
            ['user_id' => $admin->id, 'type' => 'news', 'title' => 'Welcome to the new MykaelTech platform', 'slug' => 'welcome-to-new-mykaeltech-platform',
             'excerpt' => 'We rebuilt MykaelTech from the ground up: a community platform with learning updates, tech facts, portfolio showcases and a CV generator for every member.',
             'content' => "Today marks a huge milestone. MykaelTech is no longer just a company website — it's a platform.\n\nEvery member now gets:\n- A public profile with a shareable CV link\n- A CV generator with professional PDF export\n- A learning feed to publish updates and track progress\n- Access to curated tech facts and community events\n\nThis platform was built with Laravel 12, Tailwind CSS and Filament — the same stack we teach in our community workshops.\n\nJoin the community, complete your profile and generate your first CV today.",
             'is_featured' => true, 'views' => 152],
            ['user_id' => $demo->id, 'type' => 'learning_update', 'title' => 'Week 4: Finally understood Laravel Eloquent relationships', 'slug' => 'week4-understood-eloquent-relationships',
             'excerpt' => 'This week I stopped fighting Eloquent and started using it properly. Here is what finally clicked for me with hasOne, hasMany and eager loading.',
             'content' => "For weeks I was writing manual joins and loops. Then a mentor in the community showed me eager loading and the N+1 problem disappeared.\n\nKey takeaways:\n1. define relationships on the model (hasOne, hasMany, belongsTo)\n2. use with() to eager load and avoid the N+1 query problem\n3. route model binding removes tons of boilerplate\n\nNext week: polymorphic relationships. Learning in public keeps me accountable — post your own update!",
             'views' => 89],
            ['user_id' => $admin->id, 'type' => 'tutorial', 'title' => 'Build a CV generator in Laravel in 30 minutes', 'slug' => 'build-cv-generator-laravel-30-minutes',
             'excerpt' => 'A step-by-step tutorial for building a profile-to-PDF CV generator — the exact feature powering this platform.',
             'content' => "What you need: Laravel, a members table, and barryvdh/laravel-dompdf.\n\n1. Install the package: composer require barryvdh/laravel-dompdf\n2. Create a clean, print-first Blade template\n3. Render the view to HTML, then wrap it with Pdf::loadHTML()->setPaper('a4')->download()\n4. Log each download for analytics\n\nThe trick is designing the template for print first (static colors, no dark backgrounds) and reusing it for both the web preview and the PDF export.",
             'is_featured' => true, 'views' => 210],
            ['user_id' => $demo->id, 'type' => 'learning_update', 'title' => 'Shipped my first client project!', 'slug' => 'shipped-my-first-client-project',
             'excerpt' => 'From community member to shipping a real e-commerce site for a local business. Here is the journey.',
             'content' => "Three months ago I could barely wire up a form. Today a local business is running on a store I built.\n\nWhat made it possible: the portfolio showcase here motivated me to build in public, and code reviews from senior members caught bugs I would never have found.\n\nTo anyone hesitating: join, post your progress, ask questions. It compounds fast.",
             'views' => 134],
        ];

        foreach ($posts as $p) {
            Post::create($p + ['published_at' => now()->subDays(rand(1, 20))]);
        }

        // ---------- Tech facts ----------
        $facts = [
            ['fact' => 'The first computer bug was an actual moth — found inside the Harvard Mark II computer in 1947 by Grace Hopper\'s team.', 'category' => 'History', 'source_url' => null],
            ['fact' => 'PHP powers roughly 75% of all websites with a known server-side language, including Facebook and Wikipedia.', 'category' => 'Web', 'source_url' => 'https://w3techs.com'],
            ['fact' => 'The first 1GB hard drive (IBM 1956) weighed about 1 ton. Today a fingernail-sized microSD holds 1TB.', 'category' => 'Hardware', 'source_url' => null],
            ['fact' => 'Laravel was created by Taylor Otwell in 2011 and is now the most popular PHP framework on GitHub by stars.', 'category' => 'Frameworks', 'source_url' => 'https://github.com/laravel/laravel'],
            ['fact' => 'Stack Overflow\'s annual survey consistently shows Git as the most-used developer tool worldwide.', 'category' => 'Tools', 'source_url' => 'https://survey.stackoverflow.co'],
            ['fact' => 'Tailwind CSS was created by Adam Wathan and Steve Schoger — first as a side project, now used by millions.', 'category' => 'CSS', 'source_url' => 'https://tailwindcss.com'],
            ['fact' => 'The QWERTY keyboard layout was designed for 1870s typewriters to prevent jamming — we still use it 150 years later.', 'category' => 'History', 'source_url' => null],
            ['fact' => 'There are over 700 programming languages in active use today; JavaScript remains the most commonly used for the 11th year running.', 'category' => 'Languages', 'source_url' => null],
            ['fact' => 'MySQL, which powers this platform, was named after co-founder Michael Widenius\'s daughter, My.', 'category' => 'Databases', 'source_url' => 'https://www.mysql.com'],
            ['fact' => 'The first website ever (info.cern.ch, 1991) is still online today — restored by CERN in 2013.', 'category' => 'Web', 'source_url' => 'http://info.cern.ch'],
        ];

        foreach ($facts as $f) {
            TechFact::create($f + ['published_at' => now()->subDays(rand(1, 30))]);
        }

        // ---------- Events ----------
        $events = [
            ['title' => 'Community Meetup: Intro to Laravel 12', 'starts_at' => now()->addDays(14)->setTime(17, 0),
             'description' => 'Hands-on session: build your first Laravel app in 90 minutes. Bring a laptop — all levels welcome.',
             'location' => 'Nairobi, Kenya + Zoom', 'registration_url' => 'https://forms.example.com/laravel-meetup'],
            ['title' => 'Career AMA: Breaking Into Tech', 'starts_at' => now()->addDays(28)->setTime(19, 0),
             'description' => 'Live Q&A with developers and hiring managers on CVs, portfolios and landing your first role.',
             'location' => 'Online (Zoom)', 'registration_url' => 'https://forms.example.com/career-ama'],
            ['title' => 'Workshop: Build a CV Generator', 'starts_at' => now()->addDays(42)->setTime(16, 0),
             'description' => 'Build the exact CV generator this platform uses — Laravel, DomPDF and print-first design.',
             'location' => 'Online (Google Meet)', 'registration_url' => 'https://forms.example.com/cv-workshop'],
        ];

        foreach ($events as $e) {
            Event::create($e + ['is_published' => true]);
        }
    }
}
