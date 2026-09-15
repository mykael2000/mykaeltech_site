<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            ['title' => 'LedgerFlow — Invoicing Automation', 'slug' => 'ledgerflow', 'category' => 'Web App', 'short_desc' => 'Automated invoicing pipeline for a small accounting firm — 30 hours of manual work eliminated monthly.', 'description' => 'Built on Laravel with queue-driven PDF generation, client portals and bank-statement reconciliation. The firm reports zero missed invoices since launch.', 'tech_stack' => ['Laravel', 'Livewire', 'MySQL', 'Tailwind'], 'link' => '', 'repo_url' => 'https://github.com/mykael2000', 'image' => null, 'is_featured' => true],
            ['title' => 'Chikoro — Community Learning Hub', 'slug' => 'chikoro', 'category' => 'Web App', 'short_desc' => 'A learning platform where members publish progress, share facts and track streaks.', 'description' => 'The precursor to this very platform: lesson tracking, peer reviews and a facts feed. 500+ learners onboarded in the first quarter.', 'tech_stack' => ['Laravel', 'Filament', 'MySQL'], 'link' => '', 'repo_url' => '', 'image' => null, 'is_featured' => true],
            ['title' => 'StockSense — Retail Inventory Dashboard', 'slug' => 'stocksense', 'category' => 'Data', 'short_desc' => 'Real-time inventory intelligence for a retail chain with three branches.', 'description' => 'POS integrations feed a nightly ETL into dashboards for stock levels, shrinkage alerts and reorder forecasts. Shrinkage dropped 18% in three months.', 'tech_stack' => ['Laravel', 'Chart.js', 'MySQL', 'Docker'], 'link' => '', 'repo_url' => '', 'image' => null, 'is_featured' => true],
            ['title' => 'Payview — Payroll Compliance Suite', 'slug' => 'payview', 'category' => 'Automation', 'short_desc' => 'Payroll runs with tax-compliance checks built in.', 'description' => 'A payroll engine handling multi-currency payslips, statutory deductions and audit trails, generated with accountants — for accountants.', 'tech_stack' => ['PHP', 'MySQL', 'DomPDF'], 'link' => '', 'repo_url' => '', 'image' => null, 'is_featured' => false],
            ['title' => 'MykaelTech Platform', 'slug' => 'mykaeltech-platform', 'category' => 'Web App', 'short_desc' => 'This platform: community, CV generator, learning hub and admin panel.', 'description' => 'Laravel 12 + Livewire + Filament. Public marketing site, member dashboard, PDF CV generator and a full admin panel for managing every piece of content.', 'tech_stack' => ['Laravel 12', 'Livewire', 'Filament', 'Tailwind', 'Vite'], 'link' => '', 'repo_url' => 'https://github.com/mykael2000/mykaeltech_site', 'image' => null, 'is_featured' => true],
            ['title' => 'AgriTrack — Farmer Market Prices', 'slug' => 'agritrack', 'category' => 'Data', 'short_desc' => 'Daily commodity price updates delivered via web and WhatsApp.', 'description' => 'A scraping + broadcast pipeline giving smallholder farmers daily market prices. Built for low bandwidth, used by 1,200+ farmers.', 'tech_stack' => ['Laravel', 'WhatsApp API', 'Cron'], 'link' => '', 'repo_url' => '', 'image' => null, 'is_featured' => false],
        ];

        foreach ($projects as $p) {
            Project::updateOrCreate(['slug' => $p['slug']], $p);
        }
    }
}
