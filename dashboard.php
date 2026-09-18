<?php
/**
 * User Dashboard
 * Protected page showing user information and interactive widgets
 */
require_once 'includes/config.php';
require_once 'includes/auth/functions.php';

// Require login
requireLogin();

$pageTitle = 'Dashboard';
$user = getCurrentUser();

include 'includes/header/header.php';
?>

<section class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Welcome Header -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl shadow-xl p-8 mb-8 animate-slide-down">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-2">
                        Welcome back, <?php echo htmlspecialchars($user['full_name'] ?: $user['username']); ?>! 👋
                    </h1>
                    <p class="text-blue-100">
                        Last login: <?php echo $user['last_login'] ? date('F j, Y g:i A', strtotime($user['last_login'])) : 'First time login'; ?>
                    </p>
                </div>
                <div class="mt-4 md:mt-0">
                    <a href="/logout.php" class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-all shadow-md">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Profile Card -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg p-6 animate-slide-in-left">
                    <div class="text-center mb-6">
                        <div class="w-24 h-24 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full flex items-center justify-center text-white text-4xl font-bold mx-auto mb-4">
                            <?php echo strtoupper(substr($user['username'], 0, 2)); ?>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-1">
                            <?php echo htmlspecialchars($user['full_name'] ?: $user['username']); ?>
                        </h2>
                        <p class="text-gray-600">@<?php echo htmlspecialchars($user['username']); ?></p>
                    </div>
                    
                    <div class="space-y-3 border-t border-gray-200 pt-4">
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-envelope w-6"></i>
                            <span class="text-sm"><?php echo htmlspecialchars($user['email']); ?></span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-calendar w-6"></i>
                            <span class="text-sm">Joined <?php echo date('M j, Y', strtotime($user['created_at'])); ?></span>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <button class="w-full btn-outline">
                            <i class="fas fa-edit mr-2"></i>Edit Profile
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Dashboard Widgets -->
            <div class="lg:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Quick Stats Widget -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 scroll-animate card-hover">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Account Activity</h3>
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-chart-line text-blue-600"></i>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Projects</span>
                                <span class="font-bold text-gray-900">0</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Messages</span>
                                <span class="font-bold text-gray-900">0</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Notifications</span>
                                <span class="font-bold text-gray-900">0</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Actions Widget -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 scroll-animate card-hover" style="animation-delay: 0.1s">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                            <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-bolt text-purple-600"></i>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <a href="/services.php" class="block w-full text-left px-4 py-3 bg-gray-50 hover:bg-blue-50 rounded-lg transition-colors">
                                <i class="fas fa-briefcase mr-2 text-blue-600"></i>
                                <span class="text-gray-700">Browse Services</span>
                            </a>
                            <a href="/portfolio.php" class="block w-full text-left px-4 py-3 bg-gray-50 hover:bg-blue-50 rounded-lg transition-colors">
                                <i class="fas fa-folder mr-2 text-blue-600"></i>
                                <span class="text-gray-700">View Portfolio</span>
                            </a>
                            <a href="/contact.php" class="block w-full text-left px-4 py-3 bg-gray-50 hover:bg-blue-50 rounded-lg transition-colors">
                                <i class="fas fa-envelope mr-2 text-blue-600"></i>
                                <span class="text-gray-700">Contact Us</span>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Recent Activity Widget -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 scroll-animate card-hover" style="animation-delay: 0.2s">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Recent Activity</h3>
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-clock text-green-600"></i>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-green-500 rounded-full mt-2 mr-3"></div>
                                <div>
                                    <p class="text-sm text-gray-900 font-medium">Account created</p>
                                    <p class="text-xs text-gray-500"><?php echo date('M j, Y', strtotime($user['created_at'])); ?></p>
                                </div>
                            </div>
                            <?php if ($user['last_login']): ?>
                            <div class="flex items-start">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 mr-3"></div>
                                <div>
                                    <p class="text-sm text-gray-900 font-medium">Last login</p>
                                    <p class="text-xs text-gray-500"><?php echo date('M j, Y g:i A', strtotime($user['last_login'])); ?></p>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Notifications Widget -->
                    <div class="bg-white rounded-2xl shadow-lg p-6 scroll-animate card-hover" style="animation-delay: 0.3s">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Notifications</h3>
                            <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-bell text-yellow-600"></i>
                            </div>
                        </div>
                        <div class="text-center py-8">
                            <i class="fas fa-inbox text-gray-300 text-4xl mb-3"></i>
                            <p class="text-gray-500">No new notifications</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Getting Started Section -->
        <div class="bg-white rounded-2xl shadow-lg p-8 scroll-animate">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Getting Started</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl">
                    <div class="text-4xl mb-3">📚</div>
                    <h3 class="font-semibold text-gray-900 mb-2">Explore Services</h3>
                    <p class="text-sm text-gray-600 mb-4">Discover our comprehensive range of technology and accounting services</p>
                    <a href="/services.php" class="text-blue-600 hover:text-blue-700 font-medium text-sm">
                        Learn More <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl">
                    <div class="text-4xl mb-3">💼</div>
                    <h3 class="font-semibold text-gray-900 mb-2">View Portfolio</h3>
                    <p class="text-sm text-gray-600 mb-4">Check out our latest projects and success stories</p>
                    <a href="/portfolio.php" class="text-purple-600 hover:text-purple-700 font-medium text-sm">
                        View Projects <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                <div class="text-center p-6 bg-gradient-to-br from-pink-50 to-pink-100 rounded-xl">
                    <div class="text-4xl mb-3">📞</div>
                    <h3 class="font-semibold text-gray-900 mb-2">Get in Touch</h3>
                    <p class="text-sm text-gray-600 mb-4">Have a project in mind? Let's discuss how we can help</p>
                    <a href="/contact.php" class="text-pink-600 hover:text-pink-700 font-medium text-sm">
                        Contact Us <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer/footer.php'; ?>
