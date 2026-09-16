<?php
/**
 * Footer template - included on all pages
 * Contains footer content and closing HTML structure
 */
?>
    </main>
    
    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <img src="/public/logo.png" alt="<?php echo SITE_NAME; ?> Logo" class="h-10 w-10">
                        <h3 class="text-2xl font-bold"><?php echo SITE_NAME; ?></h3>
                    </div>
                    <p class="text-gray-400 mb-4">
                        <?php echo COMPANY_DESCRIPTION; ?>
                    </p>
                    <div class="flex space-x-4">
                        <a href="<?php echo CEO_GITHUB; ?>" target="_blank" rel="noopener noreferrer" 
                           class="text-gray-400 hover:text-white transition-colors" aria-label="GitHub">
                            <i class="fab fa-github text-2xl"></i>
                        </a>
                        <a href="<?php echo CEO_LINKEDIN; ?>" target="_blank" rel="noopener noreferrer" 
                           class="text-gray-400 hover:text-white transition-colors" aria-label="LinkedIn">
                            <i class="fab fa-linkedin text-2xl"></i>
                        </a>
                        <a href="mailto:<?php echo SITE_EMAIL; ?>" 
                           class="text-gray-400 hover:text-white transition-colors" aria-label="Email">
                            <i class="fas fa-envelope text-2xl"></i>
                        </a>
                        <a href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', SITE_PHONE); ?>" 
                           class="text-gray-400 hover:text-white transition-colors" aria-label="Phone">
                            <i class="fas fa-phone text-2xl"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="/index.php" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="/services.php" class="text-gray-400 hover:text-white transition-colors">Services</a></li>
                        <li><a href="/portfolio.php" class="text-gray-400 hover:text-white transition-colors">Portfolio</a></li>
                        <li><a href="/team.php" class="text-gray-400 hover:text-white transition-colors">Team</a></li>
                        <li><a href="/contact.php" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-2"></i>
                            <a href="mailto:<?php echo SITE_EMAIL; ?>" class="hover:text-white transition-colors">
                                <?php echo SITE_EMAIL; ?>
                            </a>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone mt-1 mr-2"></i>
                            <a href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', SITE_PHONE); ?>" class="hover:text-white transition-colors">
                                <?php echo SITE_PHONE; ?>
                            </a>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2"></i>
                            <span><?php echo COMPANY_ADDRESS; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Bottom Bar -->
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
                <p class="mt-2 text-sm">Built with ❤️ using PHP and TailwindCSS</p>
            </div>
        </div>
        
        <!-- Back to Top Button -->
        <button id="back-to-top" 
                class="fixed bottom-8 right-8 bg-blue-600 text-white p-3 rounded-full shadow-lg hover:bg-blue-700 transition-all opacity-0 pointer-events-none z-40"
                aria-label="Back to top">
            <i class="fas fa-arrow-up"></i>
        </button>
    </footer>
    
    <!-- Main JavaScript -->
    <script src="<?php echo JS_URL; ?>/main.js"></script>
</body>
</html>
