<?php
/**
 * User Login Page
 * Allows users to authenticate and access their dashboard
 */
require_once 'includes/config.php';
require_once 'includes/auth/functions.php';

// Redirect if already logged in
if (isLoggedIn()) {
    header('Location: /dashboard.php');
    exit;
}

$pageTitle = 'Login';
$error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitizeInput($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $csrfToken = $_POST['csrf_token'] ?? '';
    
    // Validate CSRF token
    if (!verifyCsrfToken($csrfToken)) {
        $error = 'Invalid security token. Please try again.';
    }
    // Validate inputs
    elseif (empty($username) || empty($password)) {
        $error = 'Please enter both username and password.';
    }
    else {
        // Authenticate user
        $result = authenticateUser($username, $password);
        if ($result['success']) {
            // Redirect to dashboard
            header('Location: /dashboard.php');
            exit;
        } else {
            $error = $result['message'];
        }
    }
}

include 'includes/header/header.php';
?>

<section class="min-h-screen bg-gradient-to-br from-blue-50 to-purple-50 py-20">
    <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-2xl p-8 animate-slide-up">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-full mb-4">
                    <i class="fas fa-sign-in-alt text-white text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h1>
                <p class="text-gray-600">Login to your account</p>
            </div>
            
            <!-- Error Message -->
            <?php if ($error): ?>
            <div class="alert alert-error mb-6 animate-slide-down">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <!-- Login Form -->
            <form method="POST" action="" data-validate>
                <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                
                <div class="mb-4">
                    <label for="username" class="form-label">
                        <i class="fas fa-user mr-2"></i>Username
                    </label>
                    <input type="text" id="username" name="username" required
                           class="form-input" placeholder="Enter your username"
                           value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>"
                           autofocus>
                </div>
                
                <div class="mb-6">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock mr-2"></i>Password
                    </label>
                    <input type="password" id="password" name="password" required
                           class="form-input" placeholder="Enter your password">
                </div>
                
                <div class="mb-6 flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-700">
                        Forgot password?
                    </a>
                </div>
                
                <button type="submit" class="w-full btn-primary py-3 text-lg">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </button>
            </form>
            
            <!-- Register Link -->
            <div class="mt-6 text-center border-t border-gray-200 pt-6">
                <p class="text-gray-600">
                    Don't have an account?
                    <a href="/register.php" class="text-blue-600 hover:text-blue-700 font-semibold">
                        Register here
                    </a>
                </p>
            </div>
            
            <!-- Back to Home -->
            <div class="mt-4 text-center">
                <a href="/index.php" class="text-gray-500 hover:text-gray-700 text-sm">
                    <i class="fas fa-arrow-left mr-1"></i>Back to Home
                </a>
            </div>
        </div>
        
        <!-- Demo Account Info (for testing) -->
        <div class="mt-8 bg-yellow-50 border border-yellow-200 rounded-lg p-4 text-center">
            <p class="text-sm text-yellow-800">
                <i class="fas fa-info-circle mr-2"></i>
                <strong>New to the site?</strong> Create an account to access the dashboard and explore all features.
            </p>
        </div>
    </div>
</section>

<?php include 'includes/footer/footer.php'; ?>
