<?php
/**
 * Configuration file for Mykaeltech website
 * Contains site-wide settings and constants
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Derive the application base path from the request so the plain-PHP site
// works both at the web root (/) and inside a sub-directory (e.g. /mykaeltech_site).
//   SCRIPT_NAME "/mykaeltech_site/index.php" -> "/mykaeltech_site"
//   SCRIPT_NAME "/index.php"                 -> ""  (web root)
// Using SCRIPT_NAME (not DOCUMENT_ROOT) keeps BASE_URL === "" at the web root,
// which avoids broken "//public/..." protocol-relative asset URLs there.
$__scriptName = isset($_SERVER['SCRIPT_NAME']) ? str_replace('\\', '/', $_SERVER['SCRIPT_NAME']) : '';
$__baseDir = rtrim(dirname($__scriptName), '/');
define('BASE_URL', ($__baseDir === '' || $__baseDir === '.') ? '' : $__baseDir);
unset($__scriptName, $__baseDir);

// Load data layer + admin-edited settings (from /data/site/*.json when present)
require_once __DIR__ . '/data.php';
$siteSettings = load_site_settings();

// Helper to build an internal URL that is aware of the current base path.
function url($path = '') {
    return BASE_URL . '/' . ltrim($path, '/');
}

// Detect the base URL path so the site works both at a domain root (vhost)
// and inside a subdirectory such as /mykaeltech_site/ on XAMPP.
if (!defined('BASE_URL')) {
    $__script = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : (isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : '/');
    $__base = rtrim(str_replace('\\', '/', dirname($__script)), '/');
    define('BASE_URL', $__base);
}

// Helper to build internal URLs relative to the detected base path.
if (!function_exists('url')) {
    function url($path = '') {
        return BASE_URL . '/' . ltrim($path, '/');
    }
}

// Site configuration (editable via Admin > Settings)
define('SITE_NAME', $siteSettings['site_name'] ?? 'MykaelTech');
define('SITE_TITLE', $siteSettings['site_title'] ?? 'Mykaeltech - Tech & Accounting Strategic Partners');
define('SITE_URL', $siteSettings['site_url'] ?? 'https://mykaeltech.com');
define('SITE_EMAIL', $siteSettings['site_email'] ?? 'info@mykaeltech.com');
define('SITE_PHONE', $siteSettings['site_phone'] ?? '+1 (555) 987-6543');
define('SITE_ADDRESS', $siteSettings['site_address'] ?? '123 Tech Boulevard, Innovation City, IC 12345');
define('SITE_FAVICON', BASE_URL . '/public/favicon.svg');
$__logo = $siteSettings['site_logo'] ?? '/public/logo.png';
define('SITE_LOGO', (strpos($__logo, 'http') === 0 || strpos($__logo, '//') === 0) ? $__logo : BASE_URL . '/' . ltrim($__logo, '/'));
unset($__logo);

// Directory paths
define('BASE_PATH', dirname(__DIR__));
define('INCLUDES_PATH', BASE_PATH . '/includes');
define('ASSETS_PATH', BASE_PATH . '/assets');
define('PUBLIC_PATH', BASE_PATH . '/public');
define('DATA_PATH', BASE_PATH . '/data');
define('USERS_DATA_PATH', DATA_PATH . '/users');
define('SESSIONS_DATA_PATH', DATA_PATH . '/sessions');

// Web paths (base-path aware: work at domain root or inside a subfolder like /mykaeltech_site)
define('ASSETS_URL', BASE_URL . '/assets');
define('IMAGES_URL', BASE_URL . '/public/images');
define('CSS_URL', BASE_URL . '/public/css');
define('JS_URL', BASE_URL . '/public/js');
define('ICONS_URL', BASE_URL . '/public/icons');

// CEO Information (editable via Admin > Settings)
define('CEO_NAME', $siteSettings['ceo_name'] ?? 'Michael Erameh');
define('CEO_TITLE', $siteSettings['ceo_title'] ?? 'CEO & Founder');
define('CEO_BIO', $siteSettings['ceo_bio'] ?? 'Visionary leader with 10+ years of experience in technology and financial services. Passionate about bridging the gap between innovative technology solutions and strategic business accounting.');
define('CEO_GITHUB', $siteSettings['ceo_github'] ?? 'https://github.com/mykael2000');
define('CEO_LINKEDIN', $siteSettings['ceo_linkedin'] ?? 'https://linkedin.com/in/michael-erameh');
define('CEO_EMAIL', $siteSettings['ceo_email'] ?? 'michael@mykaeltech.com');

// Company information (editable via Admin > Settings)
define('COMPANY_DESCRIPTION', $siteSettings['company_description'] ?? 'Mykaeltech specializes in integrated solutions that bridge technology and accounting, providing transformative services from modern cloud infrastructure to precise financial modeling.');
define('COMPANY_FOUNDED', $siteSettings['company_founded'] ?? '2015');
define('COMPANY_ADDRESS', $siteSettings['company_address'] ?? '123 Tech Boulevard, Innovation City, IC 12345');

// Services
$GLOBALS['services'] = [
    [
        'name' => 'Software Development',
        'icon' => '💻',
        'description' => 'Custom software solutions tailored to your business needs using modern technologies and best practices.',
        'features' => ['Web Applications', 'Mobile Apps', 'API Development', 'Legacy System Modernization'],
        'starting_price' => '$5,000',
    ],
    [
        'name' => 'Fintech & Accounting',
        'icon' => '💰',
        'description' => 'Innovative financial technology solutions and comprehensive accounting services to streamline your business operations.',
        'features' => ['Financial Modeling', 'Accounting Software', 'Payment Integration', 'Compliance Solutions'],
        'starting_price' => '$3,000',
    ],
    [
        'name' => 'Cloud Solutions',
        'icon' => '☁️',
        'description' => 'Scalable cloud infrastructure design, migration, and management for modern businesses.',
        'features' => ['Cloud Migration', 'AWS/Azure/GCP', 'DevOps', 'Infrastructure as Code'],
        'starting_price' => '$4,000',
    ],
    [
        'name' => 'UI/UX Design',
        'icon' => '🎨',
        'description' => 'Beautiful, intuitive user interfaces that enhance user experience and drive engagement.',
        'features' => ['User Research', 'Wireframing', 'Prototyping', 'Responsive Design'],
        'starting_price' => '$2,500',
    ],
    [
        'name' => 'Tech Consulting',
        'icon' => '🔍',
        'description' => 'Strategic technology consulting to help your business make informed technology decisions.',
        'features' => ['Technology Strategy', 'Digital Transformation', 'Architecture Review', 'Best Practices'],
        'starting_price' => '$200/hr',
    ],
    [
        'name' => 'Tech Teaching & Training',
        'icon' => '📚',
        'description' => 'Comprehensive training programs to upskill your team in modern technologies.',
        'features' => ['Corporate Training', 'Workshops', 'One-on-One Mentoring', 'Certification Prep'],
        'starting_price' => '$150/hr',
    ],
    [
        'name' => 'Maintenance & Support',
        'icon' => '🛠️',
        'description' => 'Ongoing maintenance and technical support to keep your systems running smoothly.',
        'features' => ['24/7 Monitoring', 'Bug Fixes', 'Performance Optimization', 'Security Updates'],
        'starting_price' => '$1,500/mo',
    ],
];

// Technologies
$GLOBALS['technologies'] = [
    ['name' => 'PHP', 'icon' => '🐘'],
    ['name' => 'JavaScript', 'icon' => '⚡'],
    ['name' => 'Python', 'icon' => '🐍'],
    ['name' => 'React', 'icon' => '⚛️'],
    ['name' => 'Node.js', 'icon' => '🟢'],
    ['name' => 'Laravel', 'icon' => '🔺'],
    ['name' => 'MySQL', 'icon' => '🗄️'],
    ['name' => 'MongoDB', 'icon' => '🍃'],
    ['name' => 'AWS', 'icon' => '☁️'],
    ['name' => 'Docker', 'icon' => '🐳'],
    ['name' => 'Git', 'icon' => '🔧'],
    ['name' => 'TailwindCSS', 'icon' => '🎨'],
];

// Testimonials
$GLOBALS['testimonials'] = [
    [
        'name' => 'Sarah Johnson',
        'company' => 'TechStart Inc.',
        'role' => 'CTO',
        'text' => 'Mykaeltech transformed our legacy systems into a modern, scalable platform. Their expertise in both technology and business processes was invaluable.',
        'rating' => 5,
    ],
    [
        'name' => 'David Chen',
        'company' => 'Finance Solutions Ltd.',
        'role' => 'CEO',
        'text' => 'The fintech solution they built for us streamlined our accounting processes and saved us countless hours. Highly recommended!',
        'rating' => 5,
    ],
    [
        'name' => 'Emily Rodriguez',
        'company' => 'Creative Agency',
        'role' => 'Design Director',
        'text' => 'Outstanding UI/UX work! They truly understand how to create interfaces that users love. Our engagement metrics increased by 40%.',
        'rating' => 5,
    ],
];

// Stats
$GLOBALS['stats'] = [
    ['label' => 'Projects Completed', 'value' => 150, 'suffix' => '+'],
    ['label' => 'Happy Clients', 'value' => 85, 'suffix' => '+'],
    ['label' => 'Years Experience', 'value' => 10, 'suffix' => '+'],
    ['label' => 'Team Members', 'value' => 12, 'suffix' => ''],
];

// Collections are overridable by admin-managed JSON files in /data/site/
$GLOBALS['services'] = load_collection('services', $GLOBALS['services']);
$GLOBALS['technologies'] = load_collection('technologies', $GLOBALS['technologies']);
$GLOBALS['testimonials'] = load_collection('testimonials', $GLOBALS['testimonials']);
$GLOBALS['stats'] = load_collection('stats', $GLOBALS['stats']);

// Helper function to get current page
function getCurrentPage() {
    $page = basename($_SERVER['PHP_SELF'], '.php');
    return $page === 'index' ? 'home' : $page;
}

// Helper function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']) && isset($_SESSION['username']);
}

// Helper function to require login
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: /login.php');
        exit;
    }
}

// Helper function to sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Helper function to validate email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Helper function to build page URLs (base-path aware)
function route($name, $param = null) {
    $routes = [
        'home' => 'index.php',
        'join' => 'register.php',
        'login' => 'login.php',
        'register' => 'register.php',
        'logout' => 'logout.php',
        'dashboard' => 'dashboard.php',
        'services' => 'services.php',
        'portfolio' => 'portfolio.php',
        'team' => 'team.php',
        'contact' => 'contact.php',
        'admin' => 'admin/index.php',
    ];
    if ($name === 'services.show' && $param) {
        return url('services.php') . '#' . urlencode($param);
    }
    return url($routes[$name] ?? $name . '.php');
}

// Helper function to build asset URLs (files under /public, base-path aware)
function asset($path) {
    return BASE_URL . '/public/' . ltrim($path, '/');
}

// Create data directories if they don't exist
if (!file_exists(USERS_DATA_PATH)) {
    mkdir(USERS_DATA_PATH, 0700, true); // More restrictive permissions
}
if (!file_exists(SESSIONS_DATA_PATH)) {
    mkdir(SESSIONS_DATA_PATH, 0700, true); // More restrictive permissions
}
