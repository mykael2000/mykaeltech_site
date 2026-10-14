<?php
/**
 * Header template - included on all pages
 * Contains navigation and opening HTML structure
 */
if (!defined('BASE_PATH')) {
    require_once __DIR__ . '/../config.php';
}

$currentPage = getCurrentPage();
$isLoggedIn = isLoggedIn();
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo COMPANY_DESCRIPTION; ?>">
    <meta name="keywords" content="software development, fintech, accounting, cloud solutions, UI/UX design, tech consulting">
    <meta name="author" content="<?php echo SITE_NAME; ?>">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' . SITE_NAME : SITE_TITLE; ?></title>
    
    <!-- Professional CSS Design System -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>/style.css">
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="<?php echo SITE_FAVICON; ?>">
<body class="bg-gray-50 text-gray-900 antialiased">
    
    <!-- Navigation Bar -->
    <nav id="navbar" class="navbar fixed w-full top-0 z-50 transition-all duration-300 bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="<?php echo SITE_URL; ?>" class="flex items-center gap-2">
                    <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-brand-primary to-brand-secondary flex items-center justify-center text-white font-bold text-sm">
                        <?php echo strtoupper(substr(SITE_NAME, 0, 2)); ?>
                    </div>
                    <span class="text-xl font-bold text-gray-900"><?php echo SITE_NAME; ?></span>
                </a>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/index.php" class="nav-link <?php echo $currentPage === 'home' ? 'active' : ''; ?>"><i class="fas fa-home mr-1"></i>Home</a>
                    <a href="/services.php" class="nav-link <?php echo $currentPage === 'services' ? 'active' : ''; ?>"><i class="fas fa-cogs mr-1"></i>Services</a>
                    <a href="/portfolio.php" class="nav-link <?php echo $currentPage === 'portfolio' ? 'active' : ''; ?>"><i class="fas fa-briefcase mr-1"></i>Portfolio</a>
                    <a href="/team.php" class="nav-link <?php echo $currentPage === 'team' ? 'active' : ''; ?>"><i class="fas fa-users mr-1"></i>Team</a>
                    <a href="/contact.php" class="nav-link <?php echo $currentPage === 'contact' ? 'active' : ''; ?>"><i class="fas fa-envelope mr-1"></i>Contact</a>
                    
                    <?php if ($isLoggedIn): ?>
                        <a href="/dashboard.php" class="nav-link <?php echo $currentPage === 'dashboard' ? 'active' : ''; ?>"><i class="fas fa-user-circle mr-1"></i>Dashboard</a>
                        <a href="/logout.php" class="btn btn-secondary text-sm px-3 py-2"><i class="fas fa-sign-out-alt mr-1"></i>Logout</a>
                    <?php else: ?>
                        <a href="/login.php" class="btn btn-primary text-sm px-4 py-2"><i class="fas fa-sign-in-alt mr-1"></i>Login</a>
                        <a href="/register.php" class="btn btn-outline text-sm px-4 py-2"><i class="fas fa-user-plus mr-1"></i>Register</a>
                    <?php endif; ?>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-gray-700 hover:text-blue-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="menu-open-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path id="menu-close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
            <div class="px-4 py-3 space-y-3">
                <a href="/index.php" class="mobile-nav-link <?php echo $currentPage === 'home' ? 'active' : ''; ?>">
                    Home
                </a>
                <a href="/services.php" class="mobile-nav-link <?php echo $currentPage === 'services' ? 'active' : ''; ?>">
                    Services
                </a>
                <a href="/portfolio.php" class="mobile-nav-link <?php echo $currentPage === 'portfolio' ? 'active' : ''; ?>">
                    Portfolio
                </a>
                <a href="/team.php" class="mobile-nav-link <?php echo $currentPage === 'team' ? 'active' : ''; ?>">
                    Team
                </a>
                <a href="/contact.php" class="mobile-nav-link <?php echo $currentPage === 'contact' ? 'active' : ''; ?>">
                    Contact
                </a>
                
                <?php if ($isLoggedIn): ?>
                    <a href="/dashboard.php" class="mobile-nav-link <?php echo $currentPage === 'dashboard' ? 'active' : ''; ?>">
                        <i class="fas fa-user-circle"></i> Dashboard
                    </a>
                    <a href="/logout.php" class="mobile-nav-link">
                        Logout
                    </a>
                <?php else: ?>
                    <a href="/login.php" class="mobile-nav-link">
                        Login
                    </a>
                    <a href="/register.php" class="mobile-nav-link">
                        Register
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    
    <!-- Main Content (pages will add content here) -->
    <main class="pt-16">
