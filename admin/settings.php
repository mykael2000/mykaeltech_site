<?php
/**
 * Admin: Site Settings (name, contact, CEO, company)
 */
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/layout.php';
admin_require_login();
csrf_verify();

// key => [label, type, default]
$FIELDS = [
    'Site Identity' => [
        'site_name' => ['Site Name', 'text', 'MykaelTech'],
        'site_title' => ['Browser Title', 'text', 'Mykaeltech - Tech & Accounting Strategic Partners'],
        'site_url' => ['Site URL', 'text', 'https://mykaeltech.com'],
        'site_logo' => ['Logo Path', 'text', '/public/logo.png'],
    ],
    'Contact Details' => [
        'site_email' => ['Public Email', 'text', 'info@mykaeltech.com'],
        'site_phone' => ['Phone', 'text', '+1 (555) 987-6543'],
        'site_address' => ['Address', 'text', '123 Tech Boulevard, Innovation City, IC 12345'],
    ],
    'Company' => [
        'company_description' => ['Company Description', 'textarea', 'Mykaeltech specializes in integrated solutions that bridge technology and accounting, providing transformative services from modern cloud infrastructure to precise financial modeling.'],
        'company_founded' => ['Founded Year', 'text', '2015'],
        'company_address' => ['Company Address', 'text', '123 Tech Boulevard, Innovation City, IC 12345'],
    ],
    'CEO / Founder' => [
        'ceo_name' => ['CEO Name', 'text', 'Michael Erameh'],
        'ceo_title' => ['CEO Title', 'text', 'CEO & Founder'],
        'ceo_bio' => ['CEO Bio', 'textarea', 'Visionary leader with 10+ years of experience in technology and financial services.'],
        'ceo_email' => ['CEO Email', 'text', 'michael@mykaeltech.com'],
        'ceo_github' => ['CEO GitHub URL', 'text', 'https://github.com/mykael2000'],
        'ceo_linkedin' => ['CEO LinkedIn URL', 'text', 'https://linkedin.com/in/michael-erameh'],
    ],
];

if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    $settings = [];
    foreach ($FIELDS as $group) {
        foreach ($group as $key => $meta) {
            $settings[$key] = trim($_POST[$key] ?? '');
        }
    }
    if (save_site_settings($settings)) {
        admin_set_flash('success', 'Settings saved. Changes are live site-wide.');
    } else {
        admin_set_flash('error', 'Could not write settings file. Check /data/site permissions.');
    }
    header('Location: /admin/settings.php');
    exit;
}

$current = load_site_settings();

admin_header('Site Settings', 'settings');
admin_flash();
?>
<div class="admin-panel">
    <div class="admin-panel-head"><h2>Site Settings</h2></div>
    <div class="admin-panel-body">
        <p style="margin-top:0;color:#64748b;font-size:0.88rem;">These values power the header, footer, contact page, and SEO tags on every public page. They are stored in <code>/data/site/settings.json</code>; fields left empty fall back to built-in defaults.</p>
        <form method="post" action="/admin/settings.php">
            <?php echo csrf_field(); ?>
            <?php foreach ($FIELDS as $groupName => $group): ?>
            <h3 style="font-size:0.85rem;text-transform:uppercase;letter-spacing:0.06em;color:#0891b2;margin:1.5rem 0 0.75rem;"><?php echo e($groupName); ?></h3>
            <?php foreach ($group as $key => [$label, $type, $default]): ?>
                <div class="admin-field">
                    <label class="admin-label"><?php echo e($label); ?></label>
                    <?php if ($type === 'textarea'): ?>
                        <textarea class="admin-textarea" name="<?php echo e($key); ?>"><?php echo e($current[$key] ?? $default); ?></textarea>
                    <?php else: ?>
                        <input class="admin-input" type="text" name="<?php echo e($key); ?>" value="<?php echo e($current[$key] ?? $default); ?>">
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <?php endforeach; ?>
            <button class="admin-btn" type="submit" style="margin-top:0.5rem;"><i class="fas fa-save"></i>Save All Settings</button>
        </form>
    </div>
</div>
<?php admin_footer(); ?>