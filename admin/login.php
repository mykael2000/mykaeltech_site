<?php
/**
 * Admin Login
 */
require_once __DIR__ . '/includes/auth.php';

if (admin_logged_in()) {
    header('Location: /admin/index.php');
    exit;
}

$error = '';
if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
    csrf_verify();
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    if ($username === '' || $password === '') {
        $error = 'Please enter both username and password.';
    } elseif (admin_attempt_login($username, $password)) {
        header('Location: /admin/index.php');
        exit;
    } else {
        $error = 'Invalid credentials. Please try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login | <?php echo e(SITE_NAME); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>/admin.css">
</head>
<body class="admin-login-wrap">
    <div class="admin-login-card">
        <div style="display:flex;align-items:center;gap:0.75rem;margin-bottom:1.5rem;">
            <span class="admin-brand-mark" style="width:2.75rem;height:2.75rem;font-size:1rem;"><?php echo strtoupper(substr(SITE_NAME, 0, 2)); ?></span>
            <div>
                <h1 style="margin:0;"><?php echo e(SITE_NAME); ?></h1>
                <p class="sub" style="margin:0;">Admin Panel</p>
            </div>
        </div>
        <?php if ($error): ?>
            <div class="admin-flash admin-flash-error"><?php echo e($error); ?></div>
        <?php endif; ?>
        <form method="post" action="/admin/login.php">
            <?php echo csrf_field(); ?>
            <div class="admin-field">
                <label class="admin-label" for="username">Username</label>
                <input class="admin-input" type="text" id="username" name="username" required autofocus value="<?php echo e($_POST['username'] ?? ''); ?>">
            </div>
            <div class="admin-field">
                <label class="admin-label" for="password">Password</label>
                <input class="admin-input" type="password" id="password" name="password" required>
            </div>
            <button class="admin-btn" type="submit" style="width:100%;justify-content:center;">
                <i class="fas fa-sign-in-alt"></i> Sign In
            </button>
        </form>
        <p class="sub" style="margin:1.25rem 0 0;font-size:0.75rem;">Default credentials: <strong>admin / admin123</strong> — change them in <code>/data/admin_users.json</code>.</p>
    </div>
</body>
</html>