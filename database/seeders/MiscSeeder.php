<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class MiscSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            ['author_name' => 'Rudo Chikafu', 'name' => 'Rudo Chikafu', 'author_role' => 'Owner, Rudo Retail', 'role' => 'Owner, Rudo Retail', 'content' => 'MykaelTech rebuilt our inventory system and cut our stock losses by nearly a fifth. They explain everything in plain language and deliver on time.', 'quote' => 'MykaelTech rebuilt our inventory system and cut our stock losses by nearly a fifth. They explain everything in plain language and deliver on time.', 'sort_order' => 1, 'is_active' => true],
            ['author_name' => 'Farai Mutasa', 'name' => 'Farai Mutasa', 'author_role' => 'Community Member', 'role' => 'Community Member', 'content' => 'I joined to learn Laravel and stayed for the people. The learning feed keeps me accountable — and the CV generator got me my first interview.', 'quote' => 'I joined to learn Laravel and stayed for the people. The learning feed keeps me accountable — and the CV generator got me my first interview.', 'sort_order' => 2, 'is_active' => true],
            ['author_name' => 'Nyasha Dube', 'name' => 'Nyasha Dube', 'author_role' => 'Finance Manager, Agroworks', 'role' => 'Finance Manager, Agroworks', 'content' => 'Finally, developers who speak accounting. Our payroll suite is accurate to the cent and audited without drama.', 'quote' => 'Finally, developers who speak accounting. Our payroll suite is accurate to the cent and audited without drama.', 'sort_order' => 3, 'is_active' => true],
        ];
        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['author_name' => $t['author_name']], $t);
        }

        $events = [
            ['title' => 'Community Standup: Show & Tell', 'description' => 'Monthly online standup — members demo what they built, ask for help and swap learning updates. Beginners welcome, always.', 'location' => 'Google Meet', 'starts_at' => now()->addDays(7)->setTime(18, 0), 'registration_url' => null, 'is_published' => true],
            ['title' => 'Workshop: Your First Laravel App', 'description' => 'Hands-on session installing Laravel, building a CRUD app and deploying it. Bring a laptop with PHP 8.2+ installed.', 'location' => 'Harare Hub + Online', 'starts_at' => now()->addDays(21)->setTime(14, 0), 'registration_url' => null, 'is_published' => true],
            ['title' => 'CV Clinic — Get Your Profile Hire-Ready', 'description' => 'Live review of community CVs using the platform generator. Learn what recruiters actually read in the first 30 seconds.', 'location' => 'Google Meet', 'starts_at' => now()->addDays(35)->setTime(17, 30), 'registration_url' => null, 'is_published' => true],
        ];
        foreach ($events as $e) {
            Event::updateOrCreate(['title' => $e['title']], $e);
        }

        $team = [
            ['name' => 'Mykael Ncube', 'role' => 'Founder & Lead Engineer', 'bio' => 'Bridging technology and accounting. Writes the code, checks the numbers, and believes every business deserves honest software.', 'image_path' => null, 'photo_path' => null, 'photo' => null, 'linkedin_url' => '', 'github_url' => 'https://github.com/mykael2000', 'twitter_url' => '', 'email' => 'mykael@mykaeltech.com', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'Tendai Moyo', 'role' => 'Community Lead', 'bio' => 'Runs the learning feed, CV clinics and member onboarding. Convinced that learning in public is the fastest way to grow.', 'image_path' => null, 'photo_path' => null, 'photo' => null, 'linkedin_url' => '', 'github_url' => '', 'twitter_url' => '', 'email' => 'tendai@mykaeltech.com', 'sort_order' => 2, 'is_active' => true],
        ];
        foreach ($team as $t) {
            TeamMember::updateOrCreate(['name' => $t['name']], $t);
        }
    }
}
