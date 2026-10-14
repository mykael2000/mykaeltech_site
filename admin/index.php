<?php
/**
 * Admin Dashboard
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
admin_require_login();

$counts = [
    'Services' => ['icon' => 'fa-cogs', 'value' => count(load_collection('services', $GLOBALS['services'])), 'link' => '/admin/services.php'],
    'Technologies' => ['icon' => 'fa-microchip', 'value' => count(load_collection('technologies', $GLOBALS['technologies'])), 'link' => '/admin/technologies.php'],
    'Testimonials' => ['icon' => 'fa-comments', 'value' => count(load_collection('testimonials', $GLOBALS['testimonials'])), 'link' => '/admin/testimonials.php'],
    'Stats' => ['icon' => 'fa-chart-simple', 'value' => count(load_collection('stats', $GLOBALS['stats'])), 'link' => '/admin/stats.php'],
];

admin_header('Dashboard', 'dashboard');
?>
<p style="margin-top:0;color:#64748b;">Welcome back, <strong><?php echo e($_SESSION['admin_user'] ?? 'admin'); ?></strong>. Manage the public site content below.</p>

<div class="admin-stat-grid">
    <?php foreach ($counts as $label => $c): ?>
    <a href="<?php echo $c['link']; ?>" class="admin-stat" style="text-decoration:none;color:inherit;">
        <span class="admin-stat-icon"><i class="fas <?php echo $c['icon']; ?>"></i></span>
        <span>
            <span class="admin-stat-value"><?php echo $c['value']; ?></span>
            <span class="admin-stat-label" style="display:block;"><?php echo e($label); ?></span>
        </span>
    </a>
    <?php endforeach; ?>
</div>

<div class="admin-panel">
    <div class="admin-panel-head"><h2>Quick Actions</h2></div>
    <div class="admin-panel-body" style="display:flex;gap:0.75rem;flex-wrap:wrap;">
        <a class="admin-btn" href="/admin/services.php?action=add"><i class="fas fa-plus"></i>New Service</a>
        <a class="admin-btn admin-btn-secondary" href="/admin/technologies.php?action=add"><i class="fas fa-plus"></i>New Technology</a>
        <a class="admin-btn admin-btn-secondary" href="/admin/testimonials.php?action=add"><i class="fas fa-plus"></i>New Testimonial</a>
        <a class="admin-btn admin-btn-secondary" href="/admin/settings.php"><i class="fas fa-sliders"></i>Edit Site Settings</a>
        <a class="admin-btn admin-btn-secondary" href="/index.php" target="_blank"><i class="fas fa-external-link-alt"></i>View Live Site</a>
    </div>
</div>

<div class="admin-panel">
    <div class="admin-panel-head"><h2>How content flows</h2></div>
    <div class="admin-panel-body" style="color:#475569;font-size:0.92rem;line-height:1.7;">
        <p style="margin-top:0;">Everything you edit here is saved as JSON files inside <code>/data/site/</code> and instantly appears on the public pages (homepage, services page, footer, and more). If a file is deleted, the site falls back to its built-in defaults.</p>
        <p style="margin-bottom:0;">Site-wide details — name, email, phone, address, CEO bio — live under <a href="/admin/settings.php">Site Settings</a>.</p>
    </div>
</div>
<?php admin_footer(); ?>