<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Models\Service;
use App\Models\Project;
use App\Models\Post;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\CommunityMember;
use App\Models\SiteSetting;

echo "Users: " . User::count() . "\n";
echo "Services: " . Service::count() . "\n";
echo "Projects: " . Project::count() . "\n";
echo "Posts: " . Post::count() . "\n";
echo "TeamMembers: " . TeamMember::count() . "\n";
echo "Testimonials: " . Testimonial::count() . "\n";
echo "CommunityMembers: " . CommunityMember::count() . "\n";
echo "SiteSettings: " . SiteSetting::count() . "\n";

$admin = User::where('email', 'admin@mykaeltech.com')->first();
echo "Admin exists: " . ($admin ? "YES (is_admin=" . $admin->is_admin . ")" : "NO") . "\n";

$siteName = SiteSetting::where('key', 'general.site_name')->value('value');
echo "Site name: " . ($siteName ?? 'NOT SET') . "\n";