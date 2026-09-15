<?php

namespace Database\Seeders;

use App\Models\CommunityMember;
use Illuminate\Database\Seeder;

class CommunitySeeder extends Seeder
{
    public function run(): void
    {
        $member = CommunityMember::updateOrCreate(
            ['user_id' => \App\Models\User::where('email', 'demo@mykaeltech.com')->value('id') ?? 1],
            [
                'username' => 'tendai-moyo',
                'headline' => 'Aspiring Laravel Developer',
                'bio' => 'Career-switcher from retail management into software. Learning Laravel in public, one project at a time.',
                'company' => 'MykaelTech Community',
                'location' => 'Harare, Zimbabwe',
                'phone' => '+263 700 000 001',
                'skills' => ['PHP', 'Laravel', 'MySQL', 'Tailwind CSS', 'Git'],
                'linkedin_url' => 'https://linkedin.com/in/example',
                'github_url' => 'https://github.com/example',
                'twitter_url' => null,
                'website_url' => null,
                'is_public' => true,
            ]
        );

        $member->experiences()->updateOrCreate(
            ['company' => 'GreenMart Retail'],
            ['position' => 'Operations Manager', 'description' => 'Ran daily operations for a 12-person retail branch; introduced a spreadsheet-free stock process.', 'start_date' => '2021-03-01', 'end_date' => '2025-06-30', 'is_current' => false]
        );
        $member->experiences()->updateOrCreate(
            ['company' => 'MykaelTech (Intern)'],
            ['position' => 'Junior Web Developer', 'description' => 'Building community features in Laravel. Shipped the facts feed and the newsletter signup.', 'start_date' => '2025-07-01', 'end_date' => null, 'is_current' => true]
        );
        $member->educations()->updateOrCreate(
            ['institution' => 'University of Zimbabwe'],
            ['degree' => 'BSc', 'field' => 'Business Administration', 'start_year' => '2016', 'end_year' => '2020', 'description' => null]
        );
        $member->certifications()->updateOrCreate(
            ['name' => 'Laravel Certified Developer (in progress)'],
            ['issuer' => 'MykaelTech Academy', 'issue_date' => '2026-08-01', 'credential_url' => null]
        );
    }
}
