<?php
/**
 * Homepage - MykaelTech Website
 * Professional, animated landing page
 */
require_once 'includes/config.php';

$pageTitle = 'Home';
$services = $GLOBALS['services'];
$technologies = $GLOBALS['technologies'];
$testimonials = $GLOBALS['testimonials'];
$stats = $GLOBALS['stats'];

include 'includes/header/header.php';
?>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-brand-primary via-brand-secondary to-violet-600 text-white py-20 md:py-28 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl animate-pulse"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-300 rounded-full filter blur-3xl animate-bounce"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="text-center md:text-left">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-medium text-white">
                    <span class="h-1.5 w-1.5 rounded-full bg-white"></span>
                    A community of builders, not just an agency
                </span>
                
                <h1 class="mt-8 text-4xl md:text-6xl font-extrabold leading-tight">
                    Build. Learn. <span class="text-gradient">Belong.</span>
                </h1>
                
                <p class="mt-6 text-lg md:text-xl text-white/90">
                    MykaelTech turns ideas into products and learners into professionals.
                    Explore our services, showcase your portfolio, track learning updates,
                    and generate a professional CV — all in one place.
                </p>
                
                <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="<?php echo route('join'); ?>" class="btn btn-primary px-8 py-4 text-base">
                        <i class="fas fa-user-plus mr-2"></i>Join the Community
                    </a>
                    <a href="<?php echo route('portfolio'); ?>" class="btn btn-outline px-8 py-4 text-base">
                        <i class="fas fa-briefcase mr-2"></i>View Portfolio
                    </a>
                </div>
            </div>
            
            <div class="relative hidden md:block">
                <img src="<?php echo asset('images/workspace.jpg'); ?>" alt="<?php echo SITE_NAME; ?> Workspace" class="w-full h-80 rounded-2xl object-cover shadow-2xl" onerror="this.style.display='none'">
                <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-white/10 rounded-2xl backdrop-blur-lg border border-white/20 flex items-center justify-center">
                    <span class="text-3xl font-bold">150+</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <?php foreach ($stats as $stat): ?>
            <div>
                <div class="counter text-4xl font-bold text-gray-900 mb-2" data-target="<?php echo $stat['value']; ?>" data-suffix="<?php echo $stat['suffix']; ?>">0</div>
                <p class="text-sm text-gray-500 font-medium"><?php echo $stat['label']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Services Preview -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Comprehensive technology and accounting solutions tailored to your business needs
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach (array_slice($services, 0, 3) as $service): ?>
            <div class="card service-card hover:shadow-2xl transition-all duration-300">
                <div class="text-4xl mb-4"><?php echo $service['icon']; ?></div>
                <h3 class="text-xl font-bold mb-3 text-gray-900"><?php echo $service['name']; ?></h3>
                <p class="text-gray-600 mb-4"><?php echo $service['description']; ?></p>
                
                <ul class="space-y-2 mb-6">
                    <?php foreach ($service['features'] as $feature): ?>
                    <li class="flex items-start text-sm text-gray-700">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <span><?php echo htmlspecialchars($feature); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                
                <a href="<?php echo route('services'); ?>" class="text-brand-primary font-semibold hover:text-brand-secondary transition-colors">
                    Learn more <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-12">
            <a href="<?php echo route('services'); ?>" class="btn btn-primary px-8 py-3">
                View All Services <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Why Choose MykaelTech?</h2>
                <p class="text-xl text-gray-600 mb-8">
                    We deliver excellence through innovation, expertise, and dedication.
                    Our integrated approach bridges technology and accounting for maximum impact.
                </p>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-brand-primary/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-lightbulb text-brand-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Innovation First</h3>
                            <p class="text-gray-600">We stay ahead of technology trends to deliver cutting-edge solutions.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-brand-primary/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-hands-helping text-brand-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Expert Team</h3>
                            <p class="text-gray-600">Our team of experienced professionals brings decades of combined expertise.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-brand-primary/10 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-gem text-brand-primary text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Quality Assurance</h3>
                            <p class="text-gray-600">Rigorous quality processes ensure premium results every time.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="relative">
                <div class="bg-gradient-to-br from-brand-50 to-violet-50 rounded-2xl p-8 border border-brand-100">
                    <div class="text-center mb-6">
                        <div class="text-6xl font-bold text-brand-primary mb-4">15+</div>
                        <p class="text-gray-600 font-medium">Years of Excellence</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                            <div class="text-2xl font-bold text-gray-900">150+</div>
                            <p class="text-xs text-gray-500">Projects</p>
                        </div>
                        <div class="bg-white rounded-xl p-4 text-center shadow-sm">
                            <div class="text-2xl font-bold text-gray-900">85+</div>
                            <p class="text-xs text-gray-500">Clients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Projects -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Projects</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                A glimpse of the products we've shipped for our clients and community
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="card overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                <div class="h-40 bg-gradient-to-br from-brand-primary to-violet-600 flex items-center justify-center text-5xl group-hover:scale-105 transition-transform duration-300">
                    💰
                </div>
                <div class="p-6">
                    <span class="badge badge-primary mb-3">Fintech</span>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">SmartPay Dashboard</h3>
                    <p class="text-gray-600 text-sm">Real-time payment analytics platform with automated reconciliation and reporting.</p>
                </div>
            </div>
            
            <div class="card overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                <div class="h-40 bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center text-5xl group-hover:scale-105 transition-transform duration-300">
                    ☁️
                </div>
                <div class="p-6">
                    <span class="badge badge-primary mb-3">Cloud</span>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">MigrateX Suite</h3>
                    <p class="text-gray-600 text-sm">Zero-downtime cloud migration toolkit used to move 40+ workloads to AWS.</p>
                </div>
            </div>
            
            <div class="card overflow-hidden hover:shadow-2xl transition-all duration-300 group">
                <div class="h-40 bg-gradient-to-br from-orange-500 to-pink-600 flex items-center justify-center text-5xl group-hover:scale-105 transition-transform duration-300">
                    📚
                </div>
                <div class="p-6">
                    <span class="badge badge-primary mb-3">EdTech</span>
                    <h3 class="text-lg font-bold text-gray-900 mb-2">LearnHub LMS</h3>
                    <p class="text-gray-600 text-sm">Community learning platform with courses, certifications, and CV generation.</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-12">
            <a href="<?php echo route('portfolio'); ?>" class="btn btn-outline px-8 py-3">
                View Full Portfolio <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">What Clients Say</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Trusted by businesses around the world
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($testimonials as $testimonial): ?>
            <div class="card hover:shadow-xl transition-shadow duration-300">
                <div class="flex text-amber-400 mb-4">
                    <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                    <i class="fas fa-star"></i>
                    <?php endfor; ?>
                </div>
                <p class="text-gray-600 mb-6 italic">"<?php echo $testimonial['text']; ?>"</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-brand-primary to-violet-600 text-white flex items-center justify-center font-bold">
                        <?php echo strtoupper(substr($testimonial['name'], 0, 1)); ?>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 text-sm"><?php echo $testimonial['name']; ?></p>
                        <p class="text-gray-500 text-xs"><?php echo $testimonial['role']; ?>, <?php echo $testimonial['company']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Technologies -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Technologies We Use</h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Powered by modern, industry-leading technologies
            </p>
        </div>
        
        <div class="flex flex-wrap justify-center gap-4">
            <?php foreach ($technologies as $tech): ?>
            <div class="flex items-center gap-2 bg-white border border-gray-200 rounded-full px-5 py-2.5 shadow-sm hover:shadow-md hover:border-brand-primary/40 transition-all duration-300">
                <span class="text-xl"><?php echo $tech['icon']; ?></span>
                <span class="font-medium text-gray-700 text-sm"><?php echo $tech['name']; ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-brand-primary to-violet-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-5xl font-bold mb-6">Ready to Transform Your Business?</h2>
        <p class="text-xl mb-8 text-white/90">
            Let's discuss how we can help you achieve your technology and business goals
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?php echo route('contact'); ?>" class="btn btn-outline px-8 py-4 text-base border-white text-white hover:bg-white hover:text-brand-primary">
                <i class="fas fa-envelope mr-2"></i>Contact Us Today
            </a>
            <a href="<?php echo route('services'); ?>" class="btn btn-secondary px-8 py-4 text-base">
                <i class="fas fa-rocket mr-2"></i>View Our Services
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer/footer.php'; ?>