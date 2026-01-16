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
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo CSS_URL; ?>/style.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/public/logo.png">
    
    <script>
        // Tailwind configuration for custom animations
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 1s ease-in',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'slide-down': 'slideDown 0.8s ease-out',
                        'slide-in-left': 'slideInLeft 0.8s ease-out',
                        'slide-in-right': 'slideInRight 0.8s ease-out',
                        'bounce-slow': 'bounce 3s infinite',
                        'pulse-slow': 'pulse 3s infinite',
                        'spin-slow': 'spin 3s linear infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(100px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideDown: {
                            '0%': { transform: 'translateY(-100px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideInLeft: {
                            '0%': { transform: 'translateX(-100px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        slideInRight: {
                            '0%': { transform: 'translateX(100px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
    
    <!-- Navigation Bar -->
    <nav id="navbar" class="fixed w-full top-0 z-50 transition-all duration-300 bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <img src="/public/logo.png" alt="<?php echo SITE_NAME; ?> Logo" class="h-10 w-10 animate-pulse-slow">
                    <a href="/index.php" class="text-2xl font-bold text-blue-600 hover:text-blue-700 transition-colors">
                        <?php echo SITE_NAME; ?>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/index.php" class="nav-link <?php echo $currentPage === 'home' ? 'active' : ''; ?>">
                        Home
                    </a>
                    <a href="/services.php" class="nav-link <?php echo $currentPage === 'services' ? 'active' : ''; ?>">
                        Services
                    </a>
                    <a href="/portfolio.php" class="nav-link <?php echo $currentPage === 'portfolio' ? 'active' : ''; ?>">
                        Portfolio
                    </a>
                    <a href="/team.php" class="nav-link <?php echo $currentPage === 'team' ? 'active' : ''; ?>">
                        Team
                    </a>
                    <a href="/contact.php" class="nav-link <?php echo $currentPage === 'contact' ? 'active' : ''; ?>">
                        Contact
                    </a>
                    
                    <?php if ($isLoggedIn): ?>
                        <a href="/dashboard.php" class="nav-link <?php echo $currentPage === 'dashboard' ? 'active' : ''; ?>">
                            <i class="fas fa-user-circle"></i> Dashboard
                        </a>
                        <a href="/logout.php" class="btn-secondary">
                            Logout
                        </a>
                    <?php else: ?>
                        <a href="/login.php" class="btn-primary">
                            Login
                        </a>
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
