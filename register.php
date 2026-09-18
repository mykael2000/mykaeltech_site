<?php
/**
 * User Registration Page
 * Allows new users to create an account
 */
require_once 'includes/config.php';
require_once 'includes/auth/functions.php';

// Redirect if already logged in
if (isLoggedIn()) {
    header('Location: /dashboard.php');
    exit;
}

$pageTitle = 'Register';
$error = '';
$success = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitizeInput($_POST['username'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $fullName = sanitizeInput($_POST['full_name'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    $csrfToken = $_POST['csrf_token'] ?? '';
    
    // Validate CSRF token
    if (!verifyCsrfToken($csrfToken)) {
        $error = 'Invalid security token. Please try again.';
    }
    // Validate inputs
    elseif (empty($username) || empty($email) || empty($password)) {
        $error = 'Please fill in all required fields.';
    }
    elseif (!validateEmail($email)) {
        $error = 'Please enter a valid email address.';
    }
    elseif (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long.';
    }
    elseif ($password !== $confirmPassword) {
        $error = 'Passwords do not match.';
    }
    elseif (strlen($username) < 3) {
        $error = 'Username must be at least 3 characters long.';
    }
    else {
        // Create user
        $result = createUser($username, $email, $password, $fullName);
        if ($result['success']) {
            $success = $result['message'] . ' You can now <a href="/login.php" class="text-blue-600 hover:underline">login</a>.';
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
                    <i class="fas fa-user-plus text-white text-2xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Create Account</h1>
                <p class="text-gray-600">Join Mykaeltech today</p>
            </div>
            
            <!-- Error/Success Messages -->
            <?php if ($error): ?>
            <div class="alert alert-error mb-6 animate-slide-down">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
            <div class="alert alert-success mb-6 animate-slide-down">
                <i class="fas fa-check-circle mr-2"></i>
                <?php echo $success; ?>
            </div>
            <?php endif; ?>
            
            <!-- Registration Form -->
            <form method="POST" action="" data-validate>
                <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
                
                <div class="mb-4">
                    <label for="full_name" class="form-label">
                        <i class="fas fa-user mr-2"></i>Full Name
                    </label>
                    <input type="text" id="full_name" name="full_name" 
                           class="form-input" placeholder="John Doe"
                           value="<?php echo htmlspecialchars($_POST['full_name'] ?? ''); ?>">
                </div>
                
                <div class="mb-4">
                    <label for="username" class="form-label">
                        <i class="fas fa-at mr-2"></i>Username <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="username" name="username" required
                           class="form-input" placeholder="johndoe" minlength="3"
                           value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
                    <p class="text-sm text-gray-500 mt-1">At least 3 characters, no spaces</p>
                </div>
                
                <div class="mb-4">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope mr-2"></i>Email Address <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" required
                           class="form-input" placeholder="john@example.com"
                           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock mr-2"></i>Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" id="password" name="password" required
                           class="form-input" placeholder="••••••••" minlength="6">
                    <p class="text-sm text-gray-500 mt-1">At least 6 characters</p>
                </div>
                
                <div class="mb-6">
                    <label for="confirm_password" class="form-label">
                        <i class="fas fa-lock mr-2"></i>Confirm Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" id="confirm_password" name="confirm_password" required
                           class="form-input" placeholder="••••••••" minlength="6">
                </div>
                
                <button type="submit" class="w-full btn-primary py-3 text-lg">
                    <i class="fas fa-user-plus mr-2"></i>Create Account
                </button>
            </form>
            
            <!-- Login Link -->
            <div class="mt-6 text-center border-t border-gray-200 pt-6">
                <p class="text-gray-600">
                    Already have an account?
                    <a href="/login.php" class="text-blue-600 hover:text-blue-700 font-semibold">
                        Login here
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
    </div>
</section>

<?php include 'includes/footer/footer.php'; ?>
