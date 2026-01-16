<?php
/**
 * Configuration file for Mykaeltech website
 * Contains site-wide settings and constants
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Site configuration
define('SITE_NAME', 'Mykaeltech');
define('SITE_TITLE', 'Mykaeltech - Tech & Accounting Strategic Partners');
define('SITE_URL', 'https://mykaeltech.com');
define('SITE_EMAIL', 'info@mykaeltech.com');
define('SITE_PHONE', '+1 (555) 987-6543');

// Directory paths
define('BASE_PATH', dirname(__DIR__));
define('INCLUDES_PATH', BASE_PATH . '/includes');
define('ASSETS_PATH', BASE_PATH . '/assets');
define('DATA_PATH', BASE_PATH . '/data');
define('USERS_DATA_PATH', DATA_PATH . '/users');
define('SESSIONS_DATA_PATH', DATA_PATH . '/sessions');

// Web paths
define('ASSETS_URL', '/assets');
define('IMAGES_URL', ASSETS_URL . '/images');
define('CSS_URL', ASSETS_URL . '/css');
define('JS_URL', ASSETS_URL . '/js');
define('ICONS_URL', ASSETS_URL . '/icons');

// CEO Information
define('CEO_NAME', 'Michael Erameh');
define('CEO_TITLE', 'CEO & Founder');
define('CEO_BIO', 'Visionary leader with 10+ years of experience in technology and financial services. Passionate about bridging the gap between innovative technology solutions and strategic business accounting.');
define('CEO_GITHUB', 'https://github.com/mykael2000');
define('CEO_LINKEDIN', 'https://linkedin.com/in/michael-erameh');
define('CEO_EMAIL', 'michael@mykaeltech.com');

// Company information
define('COMPANY_DESCRIPTION', 'Mykaeltech specializes in integrated solutions that bridge technology and accounting, providing transformative services from modern cloud infrastructure to precise financial modeling.');
define('COMPANY_FOUNDED', '2015');
define('COMPANY_ADDRESS', '123 Tech Boulevard, Innovation City, IC 12345');

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

// Create data directories if they don't exist
if (!file_exists(USERS_DATA_PATH)) {
    mkdir(USERS_DATA_PATH, 0755, true);
}
if (!file_exists(SESSIONS_DATA_PATH)) {
    mkdir(SESSIONS_DATA_PATH, 0755, true);
}
