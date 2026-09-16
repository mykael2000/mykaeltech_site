<?php
/**
 * Team Page
 * Showcases CEO and team members with animated reveals
 */
require_once 'includes/config.php';

$pageTitle = 'Our Team';

// Team members - easily expandable
$teamMembers = [
    [
        'name' => CEO_NAME,
        'role' => CEO_TITLE,
        'bio' => CEO_BIO,
        'email' => CEO_EMAIL,
        'github' => CEO_GITHUB,
        'linkedin' => CEO_LINKEDIN,
        'image_placeholder' => 'M',
        'skills' => ['Leadership', 'Software Architecture', 'Business Strategy', 'Fintech'],
        'is_ceo' => true,
    ],
    // Add more team members below - simply duplicate this structure
    [
        'name' => 'Sarah Johnson',
        'role' => 'Lead Developer',
        'bio' => 'Full-stack developer with expertise in modern web technologies and cloud solutions.',
        'email' => 'sarah@mykaeltech.com',
        'github' => '#',
        'linkedin' => '#',
        'image_placeholder' => 'SJ',
        'skills' => ['React', 'Node.js', 'AWS', 'Docker'],
        'is_ceo' => false,
    ],
    [
        'name' => 'David Chen',
        'role' => 'Senior UI/UX Designer',
        'bio' => 'Creative designer focused on crafting beautiful, user-centered digital experiences.',
        'email' => 'david@mykaeltech.com',
        'github' => '#',
        'linkedin' => '#',
        'image_placeholder' => 'DC',
        'skills' => ['UI Design', 'UX Research', 'Figma', 'Prototyping'],
        'is_ceo' => false,
    ],
];

include 'includes/header/header.php';
?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-slide-down">Meet Our Team</h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto text-blue-100 animate-slide-up">
            Talented professionals dedicated to delivering excellence
        </p>
    </div>
</section>

<!-- CEO Spotlight -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php 
        $ceo = array_filter($teamMembers, fn($member) => $member['is_ceo'])[0];
        ?>
        <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl shadow-2xl overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                <!-- CEO Image/Avatar -->
                <div class="bg-gradient-to-br from-blue-600 to-purple-600 p-12 flex items-center justify-center">
                    <div class="text-center">
                        <div class="w-64 h-64 bg-white bg-opacity-20 backdrop-blur-lg rounded-full flex items-center justify-center text-white text-8xl font-bold mb-6 mx-auto animate-pulse-slow">
                            <?php echo $ceo['image_placeholder']; ?>
                        </div>
                        <div class="flex justify-center gap-4">
                            <a href="<?php echo $ceo['github']; ?>" target="_blank" rel="noopener noreferrer"
                               class="bg-white text-gray-900 p-4 rounded-full hover:bg-gray-100 transition-all shadow-lg">
                                <i class="fab fa-github text-2xl"></i>
                            </a>
                            <a href="<?php echo $ceo['linkedin']; ?>" target="_blank" rel="noopener noreferrer"
                               class="bg-white text-gray-900 p-4 rounded-full hover:bg-gray-100 transition-all shadow-lg">
                                <i class="fab fa-linkedin text-2xl"></i>
                            </a>
                            <a href="mailto:<?php echo $ceo['email']; ?>"
                               class="bg-white text-gray-900 p-4 rounded-full hover:bg-gray-100 transition-all shadow-lg">
                                <i class="fas fa-envelope text-2xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- CEO Info -->
                <div class="p-12 flex flex-col justify-center">
                    <div class="inline-block bg-yellow-400 text-gray-900 px-4 py-2 rounded-full font-bold text-sm mb-4">
                        Leadership
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-2"><?php echo $ceo['name']; ?></h2>
                    <h3 class="text-2xl text-blue-600 font-semibold mb-6"><?php echo $ceo['role']; ?></h3>
                    <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                        <?php echo $ceo['bio']; ?>
                    </p>
                    
                    <div class="mb-6">
                        <h4 class="font-semibold text-gray-900 mb-3">Core Expertise</h4>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($ceo['skills'] as $skill): ?>
                            <span class="px-4 py-2 bg-blue-100 text-blue-700 rounded-lg font-medium">
                                <?php echo $skill; ?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-envelope mr-2"></i>
                        <a href="mailto:<?php echo $ceo['email']; ?>" class="hover:text-blue-600 transition-colors">
                            <?php echo $ceo['email']; ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Members -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Our Amazing Team</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Passionate professionals working together to deliver exceptional results
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            $otherMembers = array_filter($teamMembers, fn($member) => !$member['is_ceo']);
            foreach ($otherMembers as $index => $member): 
            ?>
            <div class="team-card scroll-animate" style="animation-delay: <?php echo $index * 0.1; ?>s">
                <!-- Member Image/Avatar -->
                <div class="bg-gradient-to-br from-blue-400 to-purple-500 h-64 flex items-center justify-center text-white text-6xl font-bold relative group">
                    <?php echo $member['image_placeholder']; ?>
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex gap-3">
                            <?php if ($member['github'] !== '#'): ?>
                            <a href="<?php echo $member['github']; ?>" target="_blank" rel="noopener noreferrer"
                               class="bg-white text-gray-900 p-3 rounded-full hover:bg-gray-100 transition-colors">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                            <?php endif; ?>
                            <?php if ($member['linkedin'] !== '#'): ?>
                            <a href="<?php echo $member['linkedin']; ?>" target="_blank" rel="noopener noreferrer"
                               class="bg-white text-gray-900 p-3 rounded-full hover:bg-gray-100 transition-colors">
                                <i class="fab fa-linkedin text-xl"></i>
                            </a>
                            <?php endif; ?>
                            <a href="mailto:<?php echo $member['email']; ?>"
                               class="bg-white text-gray-900 p-3 rounded-full hover:bg-gray-100 transition-colors">
                                <i class="fas fa-envelope text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Member Info -->
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-1"><?php echo $member['name']; ?></h3>
                    <p class="text-blue-600 font-semibold mb-4"><?php echo $member['role']; ?></p>
                    <p class="text-gray-600 mb-4"><?php echo $member['bio']; ?></p>
                    
                    <!-- Skills -->
                    <div class="border-t border-gray-200 pt-4">
                        <h4 class="text-sm font-semibold text-gray-900 mb-2">Skills</h4>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($member['skills'] as $skill): ?>
                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm">
                                <?php echo $skill; ?>
                            </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Join Our Team Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl p-12">
            <div class="text-6xl mb-6">🚀</div>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Want to Join Our Team?</h2>
            <p class="text-xl text-gray-600 mb-8">
                We're always looking for talented individuals who are passionate about technology and innovation.
            </p>
            <a href="/contact.php" class="inline-block bg-blue-600 text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-blue-700 transition-all shadow-lg transform hover:-translate-y-1">
                <i class="fas fa-paper-plane mr-2"></i>Get in Touch
            </a>
        </div>
    </div>
</section>

<!-- How to Add Team Members -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-users-cog text-blue-600 mr-3"></i>
                How to Add Team Members
            </h3>
            <div class="space-y-3 text-gray-700">
                <p class="font-semibold">To add new team members to this page:</p>
                <ol class="list-decimal list-inside space-y-2 ml-4">
                    <li>Open <code class="bg-white px-2 py-1 rounded border">team.php</code> in your editor</li>
                    <li>Find the <code class="bg-white px-2 py-1 rounded border">$teamMembers</code> array near the top</li>
                    <li>Copy one of the existing team member array structures</li>
                    <li>Update the details:
                        <ul class="list-disc list-inside ml-6 mt-2 text-sm">
                            <li>name, role, bio, email</li>
                            <li>github, linkedin URLs</li>
                            <li>image_placeholder (initials)</li>
                            <li>skills array</li>
                            <li>is_ceo (set to false for regular members)</li>
                        </ul>
                    </li>
                    <li>Save the file and refresh the page</li>
                </ol>
                <p class="text-sm text-gray-600 mt-4">
                    <strong>Pro Tip:</strong> You can replace image_placeholder with actual image paths when you have photos.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Our Values</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                The principles that guide everything we do
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center scroll-animate">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-lightbulb text-blue-600 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Innovation</h3>
                <p class="text-gray-600">
                    We constantly push boundaries and explore new technologies to deliver cutting-edge solutions.
                </p>
            </div>
            
            <div class="text-center scroll-animate" style="animation-delay: 0.1s">
                <div class="w-20 h-20 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-handshake text-purple-600 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Integrity</h3>
                <p class="text-gray-600">
                    We build trust through transparency, honesty, and ethical practices in all our interactions.
                </p>
            </div>
            
            <div class="text-center scroll-animate" style="animation-delay: 0.2s">
                <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-trophy text-pink-600 text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-3">Excellence</h3>
                <p class="text-gray-600">
                    We strive for the highest quality in everything we do, from code to client communication.
                </p>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer/footer.php'; ?>
