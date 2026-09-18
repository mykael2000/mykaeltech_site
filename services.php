<?php
/**
 * Services Page
 * Showcases all services with animated cards, pricing, modals, and FAQ accordion
 */
require_once 'includes/config.php';

$pageTitle = 'Services';
$services = $GLOBALS['services'];

// FAQ data
$faqs = [
    [
        'question' => 'How long does a typical project take?',
        'answer' => 'Project timelines vary based on scope and complexity. A simple website might take 2-4 weeks, while complex enterprise solutions can take 3-6 months. We provide detailed timeline estimates during our consultation phase.',
    ],
    [
        'question' => 'Do you offer ongoing support and maintenance?',
        'answer' => 'Yes! We offer comprehensive maintenance and support packages to ensure your systems run smoothly. Our packages include monitoring, updates, bug fixes, and technical support.',
    ],
    [
        'question' => 'What is your pricing structure?',
        'answer' => 'We offer flexible pricing based on project scope. You can choose from fixed-price projects, hourly rates, or monthly retainers. We provide detailed quotes after understanding your requirements.',
    ],
    [
        'question' => 'Can you work with our existing team?',
        'answer' => 'Absolutely! We excel at collaboration and can seamlessly integrate with your existing team, whether you need additional resources or specialized expertise.',
    ],
    [
        'question' => 'Do you provide training for our staff?',
        'answer' => 'Yes, we offer comprehensive training programs tailored to your team\'s needs. This includes technical training, user training, and ongoing support materials.',
    ],
];

include 'includes/header/header.php';
?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-slide-down">Our Services</h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto text-blue-100 animate-slide-up">
            Comprehensive technology and accounting solutions tailored to your business needs
        </p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($services as $index => $service): ?>
            <div class="service-card scroll-animate" style="animation-delay: <?php echo $index * 0.1; ?>s">
                <div class="text-6xl mb-4"><?php echo $service['icon']; ?></div>
                <h3 class="text-2xl font-bold mb-3 text-gray-900"><?php echo $service['name']; ?></h3>
                <p class="text-gray-600 mb-4"><?php echo $service['description']; ?></p>
                
                <ul class="space-y-2 mb-6">
                    <?php foreach ($service['features'] as $feature): ?>
                    <li class="flex items-start text-sm text-gray-700">
                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                        <span><?php echo $feature; ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                
                <div class="border-t border-gray-200 pt-4 mt-auto">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-sm text-gray-600">Starting at</span>
                        <span class="text-2xl font-bold text-blue-600"><?php echo $service['starting_price']; ?></span>
                    </div>
                    <button class="w-full btn-primary" data-modal-target="quote-modal-<?php echo $index; ?>">
                        Request Quote
                    </button>
                </div>
            </div>
            
            <!-- Quote Request Modal -->
            <div id="quote-modal-<?php echo $index; ?>" class="modal-overlay hidden">
                <div class="modal-content">
                    <div class="p-6 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-2xl font-bold text-gray-900">Request Quote - <?php echo $service['name']; ?></h3>
                            <button data-modal-close class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times text-2xl"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <form method="POST" action="/contact.php" class="space-y-4">
                            <input type="hidden" name="service" value="<?php echo htmlspecialchars($service['name']); ?>">
                            <input type="hidden" name="quote_request" value="1">
                            
                            <div>
                                <label class="form-label">Your Name</label>
                                <input type="text" name="name" required class="form-input" placeholder="John Doe">
                            </div>
                            
                            <div>
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" required class="form-input" placeholder="john@example.com">
                            </div>
                            
                            <div>
                                <label class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-input" placeholder="+1 (555) 123-4567">
                            </div>
                            
                            <div>
                                <label class="form-label">Project Details</label>
                                <textarea name="message" required class="form-input" rows="4" 
                                          placeholder="Please describe your project requirements..."></textarea>
                            </div>
                            
                            <div>
                                <label class="form-label">Estimated Budget</label>
                                <select name="budget" class="form-input">
                                    <option value="">Select budget range</option>
                                    <option value="under-5k">Under $5,000</option>
                                    <option value="5k-10k">$5,000 - $10,000</option>
                                    <option value="10k-25k">$10,000 - $25,000</option>
                                    <option value="25k-50k">$25,000 - $50,000</option>
                                    <option value="50k-plus">$50,000+</option>
                                </select>
                            </div>
                            
                            <div class="flex gap-4 pt-4">
                                <button type="submit" class="flex-1 btn-primary">
                                    <i class="fas fa-paper-plane mr-2"></i>Send Request
                                </button>
                                <button type="button" data-modal-close class="flex-1 btn-secondary">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 scroll-animate">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Our Process</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                A streamlined approach to deliver exceptional results
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center scroll-animate">
                <div class="w-20 h-20 bg-blue-600 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4">
                    1
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-900">Discovery</h3>
                <p class="text-gray-600">We learn about your business, goals, and challenges</p>
            </div>
            
            <div class="text-center scroll-animate" style="animation-delay: 0.1s">
                <div class="w-20 h-20 bg-purple-600 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4">
                    2
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-900">Planning</h3>
                <p class="text-gray-600">We create a detailed roadmap and timeline</p>
            </div>
            
            <div class="text-center scroll-animate" style="animation-delay: 0.2s">
                <div class="w-20 h-20 bg-pink-600 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4">
                    3
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-900">Execution</h3>
                <p class="text-gray-600">We build your solution with precision and care</p>
            </div>
            
            <div class="text-center scroll-animate" style="animation-delay: 0.3s">
                <div class="w-20 h-20 bg-green-600 text-white rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4">
                    4
                </div>
                <h3 class="text-xl font-bold mb-2 text-gray-900">Delivery</h3>
                <p class="text-gray-600">We launch and provide ongoing support</p>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 scroll-animate">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
            <p class="text-xl text-gray-600">
                Find answers to common questions about our services
            </p>
        </div>
        
        <div class="space-y-4">
            <?php foreach ($faqs as $index => $faq): ?>
            <div class="accordion-item scroll-animate" style="animation-delay: <?php echo $index * 0.1; ?>s">
                <button class="accordion-header">
                    <span class="text-lg font-semibold text-gray-900"><?php echo $faq['question']; ?></span>
                    <i class="fas fa-chevron-down accordion-icon transition-transform duration-300 text-blue-600"></i>
                </button>
                <div class="accordion-content hidden">
                    <p class="text-gray-700"><?php echo $faq['answer']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Ready to Get Started?</h2>
        <p class="text-xl mb-8">
            Let's discuss your project and how we can help you succeed
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/contact.php" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-yellow-300 hover:text-blue-800 transition-all shadow-lg">
                Contact Us
            </a>
            <a href="/portfolio.php" class="border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white hover:text-blue-600 transition-all">
                View Portfolio
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer/footer.php'; ?>
