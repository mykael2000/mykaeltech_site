<?php
/**
 * Admin layout: sidebar + topbar + content wrapper.
 * Requires admin/includes/auth.php to be loaded first.
 */

function admin_header(string $title, string $active): void {
    $counts = [
        'services' => count(load_collection('services', $GLOBALS['services'])),
        'technologies' => count(load_collection('technologies', $GLOBALS['technologies'])),
        'testimonials' => count(load_collection('testimonials', $GLOBALS['testimonials'])),
        'stats' => count(load_collection('stats', $GLOBALS['stats'])),
    ];
    $user = e($_SESSION['admin_user'] ?? 'admin');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title><?php echo e($title); ?> - Admin | <?php echo e(SITE_NAME); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>/style.css">
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>/admin.css">
</head>
<body class="admin-body">
<div class="admin-shell">
    <aside class="admin-sidebar">
        <a class="admin-brand" href="/admin/index.php">
            <span class="admin-brand-mark"><?php echo strtoupper(substr(SITE_NAME, 0, 2)); ?></span>
            <span class="admin-brand-name"><?php echo e(SITE_NAME); ?></span>
        </a>
        <nav class="admin-nav">
            <div class="admin-nav-section">Overview</div>
            <a href="/admin/index.php" class="<?php echo $active === 'dashboard' ? 'active' : ''; ?>"><i class="fas fa-gauge-high"></i>Dashboard</a>
            <div class="admin-nav-section">Content</div>
            <a href="/admin/services.php" class="<?php echo $active === 'services' ? 'active' : ''; ?>"><i class="fas fa-cogs"></i>Services<span class="nav-badge"><?php echo $counts['services']; ?></span></a>
            <a href="/admin/technologies.php" class="<?php echo $active === 'technologies' ? 'active' : ''; ?>"><i class="fas fa-microchip"></i>Technologies<span class="nav-badge"><?php echo $counts['technologies']; ?></span></a>
            <a href="/admin/testimonials.php" class="<?php echo $active === 'testimonials' ? 'active' : ''; ?>"><i class="fas fa-comments"></i>Testimonials<span class="nav-badge"><?php echo $counts['testimonials']; ?></span></a>
            <a href="/admin/stats.php" class="<?php echo $active === 'stats' ? 'active' : ''; ?>"><i class="fas fa-chart-simple"></i>Stats<span class="nav-badge"><?php echo $counts['stats']; ?></span></a>
            <div class="admin-nav-section">Configuration</div>
            <a href="/admin/settings.php" class="<?php echo $active === 'settings' ? 'active' : ''; ?>"><i class="fas fa-sliders"></i>Site Settings</a>
            <a href="/index.php" target="_blank"><i class="fas fa-external-link-alt"></i>View Site</a>
            <a href="/admin/logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
        </nav>
        <div class="admin-sidebar-footer">&copy; <?php echo date('Y'); ?> <?php echo e(SITE_NAME); ?></div>
    </aside>
    <div class="admin-main">
        <header class="admin-topbar">
            <h1><?php echo e($title); ?></h1>
            <div class="admin-user">
                <span>Signed in as <strong><?php echo $user; ?></strong></span>
                <span class="admin-user-avatar"><?php echo strtoupper(substr($user, 0, 1)); ?></span>
            </div>
        </header>
        <main class="admin-content">
    <?php
}

function admin_footer(): void {
    ?>
        </main>
        <footer class="admin-footer">
            <?php echo e(SITE_NAME); ?> Admin &middot; Content stored in <code>/data/site/*.json</code>
        </footer>
    </div>
</div>
</body>
</html>
    <?php
}

/** Render flash message then clear it. */
function admin_flash(): void {
    if (!empty($_SESSION['admin_flash'])) {
        [$type, $msg] = $_SESSION['admin_flash'];
        echo '<div class="admin-flash admin-flash-' . ($type === 'error' ? 'error' : 'success') . '">' . e($msg) . '</div>';
        unset($_SESSION['admin_flash']);
    }
}

function admin_set_flash(string $type, string $msg): void {
    $_SESSION['admin_flash'] = [$type, $msg];
}