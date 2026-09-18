<?php
/**
 * 404 Error Page
 * Custom error page for not found resources
 */
require_once 'includes/config.php';

$pageTitle = '404 - Page Not Found';

// Set 404 header
http_response_code(404);

include 'includes/header/header.php';
?>

<section class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50 flex items-center justify-center py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="animate-slide-up">
            <!-- 404 Illustration -->
            <div class="mb-8">
                <div class="text-9xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600 mb-4">
                    404
                </div>
                <div class="text-6xl mb-6 animate-bounce-slow">
                    😕
                </div>
            </div>
            
            <!-- Error Message -->
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Oops! Page Not Found
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                The page you're looking for doesn't exist or has been moved. 
                Don't worry, let's get you back on track!
            </p>
            
            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <a href="/index.php" class="bg-blue-600 text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-blue-700 transition-all shadow-lg transform hover:-translate-y-1">
                    <i class="fas fa-home mr-2"></i>Go Home
                </a>
                <a href="/services.php" class="bg-white text-blue-600 border-2 border-blue-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-blue-50 transition-all transform hover:-translate-y-1">
                    <i class="fas fa-briefcase mr-2"></i>View Services
                </a>
                <a href="/contact.php" class="bg-white text-purple-600 border-2 border-purple-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-purple-50 transition-all transform hover:-translate-y-1">
                    <i class="fas fa-envelope mr-2"></i>Contact Us
                </a>
            </div>
            
            <!-- Quick Links -->
            <div class="bg-white rounded-2xl shadow-xl p-8 max-w-2xl mx-auto">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Popular Pages</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <a href="/index.php" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors group">
                        <i class="fas fa-home text-blue-600 text-2xl mr-4 group-hover:scale-110 transition-transform"></i>
                        <div class="text-left">
                            <div class="font-semibold text-gray-900">Home</div>
                            <div class="text-sm text-gray-600">Back to homepage</div>
                        </div>
                    </a>
                    
                    <a href="/services.php" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors group">
                        <i class="fas fa-briefcase text-blue-600 text-2xl mr-4 group-hover:scale-110 transition-transform"></i>
                        <div class="text-left">
                            <div class="font-semibold text-gray-900">Services</div>
                            <div class="text-sm text-gray-600">What we offer</div>
                        </div>
                    </a>
                    
                    <a href="/portfolio.php" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors group">
                        <i class="fas fa-folder text-blue-600 text-2xl mr-4 group-hover:scale-110 transition-transform"></i>
                        <div class="text-left">
                            <div class="font-semibold text-gray-900">Portfolio</div>
                            <div class="text-sm text-gray-600">Our projects</div>
                        </div>
                    </a>
                    
                    <a href="/team.php" class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-blue-50 transition-colors group">
                        <i class="fas fa-users text-blue-600 text-2xl mr-4 group-hover:scale-110 transition-transform"></i>
                        <div class="text-left">
                            <div class="font-semibold text-gray-900">Team</div>
                            <div class="text-sm text-gray-600">Meet our team</div>
                        </div>
                    </a>
                </div>
            </div>
            
            <!-- Search Box -->
            <div class="mt-8 max-w-xl mx-auto">
                <div class="bg-white rounded-lg shadow-lg p-4">
                    <form action="/index.php" method="GET" class="flex gap-2">
                        <input type="text" name="search" placeholder="Search for what you're looking for..." 
                               class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer/footer.php'; ?>
