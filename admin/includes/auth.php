<?php
/**
 * Admin auth + CSRF helpers
 * Every admin page includes this file (which loads site config).
 */
require_once dirname(__DIR__, 2) . '/includes/config.php';

define('ADMIN_USERS_FILE', DATA_PATH . '/admin_users.json');

/**
 * Load admin users; bootstraps a default admin/admin123 on first run.
 */
function admin_users(): array {
    if (file_exists(ADMIN_USERS_FILE)) {
        $data = json_decode((string) file_get_contents(ADMIN_USERS_FILE), true);
        if (is_array($data) && $data) {
            return $data;
        }
    }
    $boot = [[
        'username' => 'admin',
        'password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
        'role' => 'admin',
    ]];
    if (!is_dir(DATA_PATH)) {
        mkdir(DATA_PATH, 0755, true);
    }
    file_put_contents(ADMIN_USERS_FILE, json_encode($boot, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX);
    return $boot;
}

function admin_attempt_login(string $username, string $password): bool {
    foreach (admin_users() as $user) {
        if (hash_equals($user['username'] ?? '', $username) && password_verify($password, $user['password_hash'] ?? '')) {
            session_regenerate_id(true);
            $_SESSION['admin_user'] = $username;
            return true;
        }
    }
    return false;
}

function admin_logged_in(): bool {
    return !empty($_SESSION['admin_user']);
}

function admin_require_login(): void {
    if (!admin_logged_in()) {
        header('Location: /admin/login.php');
        exit;
    }
}

function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field(): string {
    return '<input type="hidden" name="csrf_token" value="' . csrf_token() . '">';
}

function csrf_verify(): void {
    if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
        $token = $_POST['csrf_token'] ?? '';
        if (!$token || !hash_equals(csrf_token(), $token)) {
            http_response_code(403);
            exit('Invalid CSRF token. Please go back and try again.');
        }
    }
}

/** Escape for HTML output */
function e(?string $s): string {
    return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8');
}