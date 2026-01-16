<?php
/**
 * Contact Page
 * Contact form with PHP mail() and FAQ section
 */
require_once 'includes/config.php';

$pageTitle = 'Contact Us';
$success = '';
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitizeInput($_POST['name'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $phone = sanitizeInput($_POST['phone'] ?? '');
    $subject = sanitizeInput($_POST['subject'] ?? '');
    $message = sanitizeInput($_POST['message'] ?? '');
    $service = sanitizeInput($_POST['service'] ?? '');
    $budget = sanitizeInput($_POST['budget'] ?? '');
    $isQuoteRequest = isset($_POST['quote_request']);
    
    // Validate inputs
    if (empty($name) || empty($email) || empty($message)) {
        $error = 'Please fill in all required fields.';
    } elseif (!validateEmail($email)) {
        $error = 'Please enter a valid email address.';
    } else {
        // Prepare email content
        $to = SITE_EMAIL;
        $emailSubject = $isQuoteRequest ? "Quote Request: $service" : ($subject ?: 'Contact Form Submission');
        
        $emailBody = "New " . ($isQuoteRequest ? "quote request" : "contact form submission") . " from the website:\n\n";
        $emailBody .= "Name: $name\n";
        $emailBody .= "Email: $email\n";
        $emailBody .= "Phone: $phone\n";
        if ($service) $emailBody .= "Service: $service\n";
        if ($budget) $emailBody .= "Budget: $budget\n";
        $emailBody .= "\nMessage:\n$message\n";
        
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        // Send email (Note: mail() requires proper server configuration)
        $mailSent = mail($to, $emailSubject, $emailBody, $headers);
        
        if ($mailSent) {
            $success = 'Thank you for contacting us! We will get back to you soon.';
            // Clear form fields on success
            $_POST = [];
        } else {
            // Log the error for debugging
            error_log("Contact form mail failed: $emailBody");
            
            // For development/testing without mail server configured
            $success = 'Thank you for your message! (Note: Email functionality requires server mail configuration. Your message has been logged.)';
            // In production, you might want to save to a file or database
        }
    }
}

// Contact FAQ
$contactFaqs = [
    [
        'question' => 'What is the best way to reach you?',
        'answer' => 'You can reach us through this contact form, email us directly at ' . SITE_EMAIL . ', or call us at ' . SITE_PHONE . '. We typically respond within 24 hours on business days.',
    ],
    [
        'question' => 'Do you offer free consultations?',
        'answer' => 'Yes! We offer a free initial consultation to discuss your project requirements and explore how we can help. Simply fill out the contact form or schedule a call.',
    ],
    [
        'question' => 'What information should I include in my inquiry?',
        'answer' => 'Please provide details about your project, timeline, budget range, and any specific requirements. The more information you share, the better we can prepare for our conversation.',
    ],
    [
        'question' => 'How quickly will you respond?',
        'answer' => 'We aim to respond to all inquiries within 24 hours during business days. For urgent matters, please call us directly.',
    ],
    [
        'question' => 'Do you work with international clients?',
        'answer' => 'Yes, we work with clients globally. We have experience working across different time zones and can accommodate virtual meetings.',
    ],
];

include 'includes/header/header.php';
?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-slide-down">Get in Touch</h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto text-blue-100 animate-slide-up">
            We'd love to hear from you. Let's start a conversation.
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="scroll-animate">
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Contact Information</h2>
                
                <div class="space-y-6 mb-8">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                            <i class="fas fa-envelope text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                            <a href="mailto:<?php echo SITE_EMAIL; ?>" class="text-gray-600 hover:text-blue-600 transition-colors">
                                <?php echo SITE_EMAIL; ?>
                            </a>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                            <i class="fas fa-phone text-purple-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Phone</h3>
                            <a href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', SITE_PHONE); ?>" class="text-gray-600 hover:text-purple-600 transition-colors">
                                <?php echo SITE_PHONE; ?>
                            </a>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                            <i class="fas fa-map-marker-alt text-pink-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Address</h3>
                            <p class="text-gray-600"><?php echo COMPANY_ADDRESS; ?></p>
                        </div>
                    </div>
                </div>
                
                <!-- Social Links -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-semibold text-gray-900 mb-4">Connect With Us</h3>
                    <div class="flex gap-4">
                        <a href="<?php echo CEO_GITHUB; ?>" target="_blank" rel="noopener noreferrer"
                           class="w-12 h-12 bg-gray-900 text-white rounded-full flex items-center justify-center hover:bg-gray-800 transition-colors">
                            <i class="fab fa-github text-xl"></i>
                        </a>
                        <a href="<?php echo CEO_LINKEDIN; ?>" target="_blank" rel="noopener noreferrer"
                           class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                            <i class="fab fa-linkedin text-xl"></i>
                        </a>
                        <a href="mailto:<?php echo SITE_EMAIL; ?>"
                           class="w-12 h-12 bg-purple-600 text-white rounded-full flex items-center justify-center hover:bg-purple-700 transition-colors">
                            <i class="fas fa-envelope text-xl"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Business Hours -->
                <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-xl p-6 mt-6">
                    <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
                        <i class="fas fa-clock text-blue-600 mr-2"></i>
                        Business Hours
                    </h3>
                    <div class="space-y-2 text-gray-700">
                        <div class="flex justify-between">
                            <span>Monday - Friday:</span>
                            <span class="font-semibold">9:00 AM - 6:00 PM</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Saturday:</span>
                            <span class="font-semibold">10:00 AM - 4:00 PM</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Sunday:</span>
                            <span class="font-semibold">Closed</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="scroll-animate">
                <div class="bg-white rounded-2xl shadow-2xl p-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Send us a Message</h2>
                    
                    <!-- Success/Error Messages -->
                    <?php if ($success): ?>
                    <div class="alert alert-success mb-6 animate-slide-down">
                        <i class="fas fa-check-circle mr-2"></i>
                        <?php echo $success; ?>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($error): ?>
                    <div class="alert alert-error mb-6 animate-slide-down">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <?php echo $error; ?>
                    </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="" data-validate>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="name" class="form-label">
                                    <i class="fas fa-user mr-2"></i>Your Name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" id="name" name="name" required
                                       class="form-input" placeholder="John Doe"
                                       value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>">
                            </div>
                            
                            <div>
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope mr-2"></i>Email <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" required
                                       class="form-input" placeholder="john@example.com"
                                       value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="phone" class="form-label">
                                    <i class="fas fa-phone mr-2"></i>Phone Number
                                </label>
                                <input type="tel" id="phone" name="phone"
                                       class="form-input" placeholder="+1 (555) 123-4567"
                                       value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
                            </div>
                            
                            <div>
                                <label for="subject" class="form-label">
                                    <i class="fas fa-tag mr-2"></i>Subject
                                </label>
                                <input type="text" id="subject" name="subject"
                                       class="form-input" placeholder="Project Inquiry"
                                       value="<?php echo htmlspecialchars($_POST['subject'] ?? ''); ?>">
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <label for="message" class="form-label">
                                <i class="fas fa-comment mr-2"></i>Message <span class="text-red-500">*</span>
                            </label>
                            <textarea id="message" name="message" required
                                      class="form-input" rows="6"
                                      placeholder="Tell us about your project or inquiry..."><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                        </div>
                        
                        <button type="submit" class="w-full btn-primary py-4 text-lg">
                            <i class="fas fa-paper-plane mr-2"></i>Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 scroll-animate">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
            <p class="text-xl text-gray-600">
                Quick answers to common questions
            </p>
        </div>
        
        <div class="space-y-4">
            <?php foreach ($contactFaqs as $index => $faq): ?>
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
        
        <div class="mt-12 text-center">
            <p class="text-gray-600">
                Still have questions? 
                <a href="mailto:<?php echo SITE_EMAIL; ?>" class="text-blue-600 hover:text-blue-700 font-semibold">
                    Email us directly
                </a>
            </p>
        </div>
    </div>
</section>

<!-- Map Section (Placeholder) -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-blue-100 to-purple-100 rounded-2xl p-12 text-center">
            <i class="fas fa-map-marked-alt text-6xl text-blue-600 mb-4"></i>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Visit Our Office</h3>
            <p class="text-gray-700 mb-2"><?php echo COMPANY_ADDRESS; ?></p>
            <p class="text-sm text-gray-600">
                Map integration can be added here (Google Maps, OpenStreetMap, etc.)
            </p>
        </div>
    </div>
</section>

<?php include 'includes/footer/footer.php'; ?>
