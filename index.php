<?php
/**
 * Homepage - Mykaeltech Website
 * Modern, animated landing page with hero section, highlights, CEO profile, and more
 */
require_once 'includes/config.php';

$pageTitle = 'Home';
include 'includes/header/header.php';
?>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-blue-600 via-purple-600 to-pink-500 text-white py-20 md:py-32 overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-300 rounded-full filter blur-3xl animate-bounce-slow"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="text-center md:text-left animate-slide-in-left">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                    Transform Your Business with
                    <span class="block text-yellow-300 animate-pulse">Tech & Innovation</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-gray-100">
                    Strategic partners bridging technology and accounting for transformative business solutions
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="/services.php" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-yellow-300 hover:text-blue-800 transition-all shadow-lg hover:shadow-2xl transform hover:-translate-y-1">
                        Explore Services
                    </a>
                    <a href="/contact.php" class="border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white hover:text-blue-600 transition-all shadow-lg transform hover:-translate-y-1">
                        Get in Touch
                    </a>
                </div>
            </div>
            
            <div class="flex justify-center animate-slide-in-right">
                <div class="relative">
                    <img src="/public/logo.png" alt="<?php echo SITE_NAME; ?> Logo" class="w-64 h-64 md:w-80 md:h-80 object-contain animate-spin-slow">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full filter blur-2xl opacity-30 animate-pulse"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <i class="fas fa-chevron-down text-3xl text-white opacity-75"></i>
    </div>
</section>

<!-- Company Highlights -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-animate">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Why Choose Mykaeltech?</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                We deliver excellence through innovation, expertise, and dedication
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="card card-hover text-center scroll-animate">
                <div class="text-5xl mb-4">🚀</div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Innovation First</h3>
                <p class="text-gray-600">
                    Leveraging cutting-edge technologies to deliver solutions that drive your business forward
                </p>
            </div>
            
            <div class="card card-hover text-center scroll-animate" style="animation-delay: 0.2s">
                <div class="text-5xl mb-4">💎</div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Quality Driven</h3>
                <p class="text-gray-600">
                    Committed to excellence in every project, ensuring the highest standards of quality
                </p>
            </div>
            
            <div class="card card-hover text-center scroll-animate" style="animation-delay: 0.4s">
                <div class="text-5xl mb-4">🤝</div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900">Client Focused</h3>
                <p class="text-gray-600">
                    Your success is our success. We work closely with you to achieve your goals
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Animated Stats Counter -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <?php foreach ($GLOBALS['stats'] as $stat): ?>
            <div class="text-center scroll-animate">
                <div class="stat-number counter text-white" data-target="<?php echo $stat['value']; ?>" data-suffix="<?php echo $stat['suffix']; ?>">
                    0<?php echo $stat['suffix']; ?>
                </div>
                <div class="stat-label text-gray-100"><?php echo $stat['label']; ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CEO Profile Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="scroll-animate">
                <div class="relative inline-block">
                    <div class="w-64 h-64 md:w-80 md:h-80 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center text-white text-8xl font-bold shadow-2xl">
                        <?php echo substr(CEO_NAME, 0, 1); ?>
                    </div>
                    <div class="absolute -bottom-4 -right-4 bg-yellow-400 text-gray-900 px-6 py-3 rounded-full font-bold shadow-lg">
                        <?php echo CEO_TITLE; ?>
                    </div>
                </div>
            </div>
            
            <div class="scroll-animate">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Meet Our CEO</h2>
                <h3 class="text-2xl text-blue-600 font-semibold mb-4"><?php echo CEO_NAME; ?></h3>
                <p class="text-lg text-gray-600 mb-6">
                    <?php echo CEO_BIO; ?>
                </p>
                <div class="flex gap-4">
                    <a href="<?php echo CEO_GITHUB; ?>" target="_blank" rel="noopener noreferrer" 
                       class="bg-gray-900 text-white px-6 py-3 rounded-lg hover:bg-gray-800 transition-all flex items-center gap-2">
                        <i class="fab fa-github"></i> GitHub
                    </a>
                    <a href="<?php echo CEO_LINKEDIN; ?>" target="_blank" rel="noopener noreferrer" 
                       class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all flex items-center gap-2">
                        <i class="fab fa-linkedin"></i> LinkedIn
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technologies Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-animate">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Technologies We Use</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Powered by modern, industry-leading technologies
            </p>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <?php foreach ($GLOBALS['technologies'] as $tech): ?>
            <div class="card card-hover text-center tech-card scroll-animate">
                <div class="text-5xl mb-3"><?php echo $tech['icon']; ?></div>
                <h4 class="font-semibold text-gray-900"><?php echo $tech['name']; ?></h4>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-animate">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">What Clients Say</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Don't just take our word for it - hear from our satisfied clients
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($GLOBALS['testimonials'] as $index => $testimonial): ?>
            <div class="testimonial-card scroll-animate" style="animation-delay: <?php echo $index * 0.2; ?>s">
                <div class="flex items-center mb-4">
                    <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                    <i class="fas fa-star text-yellow-400"></i>
                    <?php endfor; ?>
                </div>
                <p class="text-gray-700 mb-6 italic">"<?php echo $testimonial['text']; ?>"</p>
                <div class="border-t border-gray-200 pt-4">
                    <p class="font-bold text-gray-900"><?php echo $testimonial['name']; ?></p>
                    <p class="text-sm text-gray-600"><?php echo $testimonial['role']; ?>, <?php echo $testimonial['company']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Transform Your Business?</h2>
        <p class="text-xl mb-8">
            Let's discuss how we can help you achieve your technology and business goals
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/contact.php" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-yellow-300 hover:text-blue-800 transition-all shadow-lg transform hover:-translate-y-1">
                Contact Us Today
            </a>
            <a href="/services.php" class="border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white hover:text-blue-600 transition-all transform hover:-translate-y-1">
                View Our Services
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer/footer.php'; ?>
