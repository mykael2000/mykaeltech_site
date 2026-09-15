<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name' => 'MykaelTech',
            'site_tagline' => 'Where technology meets community',
            'hero_badge' => 'Building Africa\'s tech community',
            'hero_title' => 'Learn. Build. Belong.',
            'hero_subtitle' => 'MykaelTech is a tech-driven community platform — software services, a public learning journal, curated tech facts, and a CV generator for every member.',
            'about_text' => 'Founded by Mykael Ncube, MykaelTech bridges technology and accounting discipline: clean systems, honest numbers, and software that serves real people.',
            'contact_email' => 'hello@mykaeltech.com',
            'contact_phone' => '+263 700 000 000',
            'contact_location' => 'Harare, Zimbabwe — remote worldwide',
            'social_github' => 'https://github.com/mykael2000',
            'social_linkedin' => '',
            'social_x' => '',
            'join_cta' => 'Join the community — it\'s free',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
