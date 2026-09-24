<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['title' => 'Web Application Development', 'slug' => 'web-app-development', 'icon' => 'code-bracket', 'category' => 'Development', 'short_description' => 'Modern Laravel & JavaScript applications built to scale.', 'excerpt' => 'Modern Laravel & JavaScript applications built to scale.', 'description' => 'From MVPs to full platforms: clean architecture, tested code, CI/CD pipelines and maintainable Laravel codebases. We ship products, not prototypes.', 'features' => ['Laravel / Livewire / Filament', 'REST APIs & integrations', 'Automated testing & CI/CD', 'Cloud deployment'], 'sort_order' => 1, 'is_featured' => true, 'is_active' => true],
            ['title' => 'Business Systems & Automation', 'slug' => 'business-systems-automation', 'icon' => 'cpu-chip', 'category' => 'Automation', 'short_description' => 'Automate the boring, keep the human touch.', 'excerpt' => 'Automate the boring, keep the human touch.', 'description' => 'Accounting-grade discipline applied to your workflows: invoicing pipelines, reporting dashboards, inventory systems and process automation that pays for itself.', 'features' => ['Process mapping', 'Workflow automation', 'Reporting dashboards', 'Financial-grade accuracy'], 'sort_order' => 2, 'is_featured' => true, 'is_active' => true],
            ['title' => 'Data & Analytics', 'slug' => 'data-analytics', 'icon' => 'chart-bar', 'category' => 'Data', 'short_description' => 'Turn raw numbers into decisions.', 'excerpt' => 'Turn raw numbers into decisions.', 'description' => 'Data pipelines, warehouse-lite setups and dashboards that make your numbers speak — built with the same rigour we bring to accounting.', 'features' => ['ETL pipelines', 'KPI dashboards', 'Forecasting models', 'Data quality audits'], 'sort_order' => 3, 'is_featured' => true, 'is_active' => true],
            ['title' => 'UI/UX & Branding', 'slug' => 'ui-ux-branding', 'icon' => 'swatch', 'category' => 'Design', 'short_description' => 'Interfaces people actually enjoy using.', 'excerpt' => 'Interfaces people actually enjoy using.', 'description' => 'Design systems, branding and front-end craft — including the design tokens and component libraries that keep your product consistent.', 'features' => ['Design systems', 'Prototyping', 'Brand identity', 'Accessibility audits'], 'sort_order' => 4, 'is_featured' => false, 'is_active' => true],
            ['title' => 'Tech Training & Mentorship', 'slug' => 'tech-training', 'icon' => 'academic-cap', 'category' => 'Training', 'short_description' => 'Upskill your team with hands-on programs.', 'excerpt' => 'Upskill your team with hands-on programs.', 'description' => 'Practical workshops in modern web development, data literacy and automation — delivered remotely or on-site, with community support between sessions.', 'features' => ['Hands-on curriculum', 'Community support', 'Real projects', 'Certification paths'], 'sort_order' => 5, 'is_featured' => false, 'is_active' => true],
            ['title' => 'Maintenance & Support', 'slug' => 'maintenance-support', 'icon' => 'wrench-screwdriver', 'category' => 'Support', 'short_description' => 'We keep your systems healthy.', 'excerpt' => 'We keep your systems healthy.', 'description' => 'Monitoring, patching, performance tuning and on-call support contracts for the systems we build — or the ones we inherit.', 'features' => ['Uptime monitoring', 'Security patching', 'Performance tuning', 'SLA-backed support'], 'sort_order' => 6, 'is_featured' => false, 'is_active' => true],
        ];

        foreach ($services as $s) {
            Service::updateOrCreate(['slug' => $s['slug']], $s);
        }
    }
}
