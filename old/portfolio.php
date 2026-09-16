<?php
/**
 * Portfolio Page
 * Showcases GitHub repositories with filterable cards
 */
require_once 'includes/config.php';

$pageTitle = 'Portfolio';

// Portfolio projects - can be updated manually or fetched from GitHub API
$projects = [
    [
        'name' => 'Mykaeltech Website',
        'description' => 'Modern PHP-based company website with TailwindCSS, featuring authentication, services showcase, and portfolio.',
        'tech_stack' => ['PHP', 'TailwindCSS', 'JavaScript'],
        'category' => 'web',
        'github_url' => 'https://github.com/mykael2000/mykaeltech_site',
        'demo_url' => '',
        'image' => '/public/logo.png',
        'stars' => 0,
        'forks' => 0,
    ],
    [
        'name' => 'E-Commerce Platform',
        'description' => 'Full-featured e-commerce solution with payment integration, inventory management, and admin dashboard.',
        'tech_stack' => ['Laravel', 'Vue.js', 'MySQL'],
        'category' => 'web',
        'github_url' => '#',
        'demo_url' => '#',
        'image' => '/public/logo.png',
        'stars' => 45,
        'forks' => 12,
    ],
    [
        'name' => 'Fintech Dashboard',
        'description' => 'Real-time financial analytics dashboard with data visualization and reporting capabilities.',
        'tech_stack' => ['React', 'Node.js', 'MongoDB'],
        'category' => 'fintech',
        'github_url' => '#',
        'demo_url' => '#',
        'image' => '/public/logo.png',
        'stars' => 78,
        'forks' => 23,
    ],
    [
        'name' => 'Cloud Infrastructure Automation',
        'description' => 'Infrastructure as Code solution for AWS deployment with automated scaling and monitoring.',
        'tech_stack' => ['Terraform', 'AWS', 'Python'],
        'category' => 'cloud',
        'github_url' => '#',
        'demo_url' => '',
        'image' => '/public/logo.png',
        'stars' => 34,
        'forks' => 8,
    ],
    [
        'name' => 'Mobile Banking App',
        'description' => 'Secure mobile banking application with biometric authentication and real-time transactions.',
        'tech_stack' => ['React Native', 'Node.js', 'PostgreSQL'],
        'category' => 'mobile',
        'github_url' => '#',
        'demo_url' => '#',
        'image' => '/public/logo.png',
        'stars' => 92,
        'forks' => 31,
    ],
    [
        'name' => 'Design System Library',
        'description' => 'Comprehensive UI component library with accessibility features and documentation.',
        'tech_stack' => ['React', 'TypeScript', 'Storybook'],
        'category' => 'design',
        'github_url' => '#',
        'demo_url' => '#',
        'image' => '/public/logo.png',
        'stars' => 156,
        'forks' => 42,
    ],
];

include 'includes/header/header.php';
?>

<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-6 animate-slide-down">Our Portfolio</h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto text-blue-100 animate-slide-up">
            Explore our latest projects and successful implementations
        </p>
    </div>
</section>

<!-- Filter Buttons -->
<section class="py-8 bg-white border-b border-gray-200 sticky top-16 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-3">
            <button class="filter-btn active" data-filter="all">
                All Projects
            </button>
            <button class="filter-btn" data-filter="web">
                Web Development
            </button>
            <button class="filter-btn" data-filter="mobile">
                Mobile Apps
            </button>
            <button class="filter-btn" data-filter="fintech">
                Fintech
            </button>
            <button class="filter-btn" data-filter="cloud">
                Cloud Solutions
            </button>
            <button class="filter-btn" data-filter="design">
                Design Systems
            </button>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($projects as $index => $project): ?>
            <div class="portfolio-item bg-white rounded-xl shadow-lg overflow-hidden transition-all duration-300 opacity-100 transform scale-100 scroll-animate" 
                 data-category="<?php echo $project['category']; ?>"
                 style="animation-delay: <?php echo $index * 0.1; ?>s">
                <!-- Project Image -->
                <div class="relative h-48 bg-gradient-to-br from-blue-400 to-purple-500 overflow-hidden group">
                    <img src="<?php echo $project['image']; ?>" 
                         alt="<?php echo htmlspecialchars($project['name']); ?>"
                         class="w-full h-full object-cover opacity-75 group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex gap-4">
                            <?php if ($project['github_url'] !== '#'): ?>
                            <a href="<?php echo $project['github_url']; ?>" target="_blank" rel="noopener noreferrer"
                               class="bg-white text-gray-900 p-3 rounded-full hover:bg-gray-100 transition-colors">
                                <i class="fab fa-github text-xl"></i>
                            </a>
                            <?php endif; ?>
                            <?php if ($project['demo_url'] && $project['demo_url'] !== '#'): ?>
                            <a href="<?php echo $project['demo_url']; ?>" target="_blank" rel="noopener noreferrer"
                               class="bg-white text-gray-900 p-3 rounded-full hover:bg-gray-100 transition-colors">
                                <i class="fas fa-external-link-alt text-xl"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Project Info -->
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo htmlspecialchars($project['name']); ?></h3>
                    <p class="text-gray-600 mb-4 line-clamp-3"><?php echo htmlspecialchars($project['description']); ?></p>
                    
                    <!-- Tech Stack -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <?php foreach ($project['tech_stack'] as $tech): ?>
                        <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-sm font-medium">
                            <?php echo $tech; ?>
                        </span>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Stats -->
                    <div class="flex items-center gap-4 text-sm text-gray-600 border-t border-gray-200 pt-4">
                        <div class="flex items-center gap-1">
                            <i class="fas fa-star text-yellow-500"></i>
                            <span><?php echo $project['stars']; ?></span>
                        </div>
                        <div class="flex items-center gap-1">
                            <i class="fas fa-code-branch text-gray-500"></i>
                            <span><?php echo $project['forks']; ?></span>
                        </div>
                        <div class="ml-auto">
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-medium">
                                <?php echo ucfirst($project['category']); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- GitHub Profile Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-gray-900 to-gray-800 text-white rounded-2xl shadow-2xl p-8 md:p-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <div class="flex items-center mb-6">
                        <i class="fab fa-github text-6xl mr-4"></i>
                        <div>
                            <h2 class="text-3xl font-bold">View on GitHub</h2>
                            <p class="text-gray-300">@mykael2000</p>
                        </div>
                    </div>
                    <p class="text-gray-300 mb-6 text-lg">
                        Explore our open-source contributions and public repositories on GitHub. We believe in sharing knowledge and contributing to the developer community.
                    </p>
                    <a href="<?php echo CEO_GITHUB; ?>" target="_blank" rel="noopener noreferrer"
                       class="inline-flex items-center bg-white text-gray-900 px-8 py-4 rounded-lg font-bold text-lg hover:bg-gray-100 transition-all shadow-lg">
                        <i class="fab fa-github mr-3 text-2xl"></i>
                        Visit GitHub Profile
                    </a>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-6 text-center">
                        <div class="text-4xl font-bold mb-2">150+</div>
                        <div class="text-gray-300">Repositories</div>
                    </div>
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-6 text-center">
                        <div class="text-4xl font-bold mb-2">2K+</div>
                        <div class="text-gray-300">Contributions</div>
                    </div>
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-6 text-center">
                        <div class="text-4xl font-bold mb-2">500+</div>
                        <div class="text-gray-300">Stars</div>
                    </div>
                    <div class="bg-white bg-opacity-10 backdrop-blur-sm rounded-lg p-6 text-center">
                        <div class="text-4xl font-bold mb-2">100+</div>
                        <div class="text-gray-300">Followers</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How to Update Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                <i class="fas fa-info-circle text-blue-600 mr-3"></i>
                How to Update Portfolio
            </h3>
            <div class="space-y-3 text-gray-700">
                <p class="font-semibold">To add new projects to this portfolio:</p>
                <ol class="list-decimal list-inside space-y-2 ml-4">
                    <li>Open <code class="bg-white px-2 py-1 rounded border">portfolio.php</code> in your editor</li>
                    <li>Find the <code class="bg-white px-2 py-1 rounded border">$projects</code> array near the top</li>
                    <li>Add a new array element with your project details:
                        <ul class="list-disc list-inside ml-6 mt-2 text-sm">
                            <li>name, description, tech_stack, category</li>
                            <li>github_url, demo_url, image path</li>
                            <li>stars and forks count</li>
                        </ul>
                    </li>
                    <li>Save the file and refresh the page</li>
                </ol>
                <p class="text-sm text-gray-600 mt-4">
                    <strong>Future Enhancement:</strong> This can be upgraded to fetch repositories directly from the GitHub API for automatic updates.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-bold mb-6">Like What You See?</h2>
        <p class="text-xl mb-8">
            Let's work together to bring your ideas to life
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/contact.php" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-bold text-lg hover:bg-yellow-300 hover:text-blue-800 transition-all shadow-lg">
                Start a Project
            </a>
            <a href="/services.php" class="border-2 border-white text-white px-8 py-4 rounded-lg font-bold text-lg hover:bg-white hover:text-blue-600 transition-all">
                View Services
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer/footer.php'; ?>
