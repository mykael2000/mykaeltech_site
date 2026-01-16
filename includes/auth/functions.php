<?php
/**
 * Authentication helper functions
 * Handles user registration, login, and session management
 */

require_once dirname(__DIR__) . '/config.php';

/**
 * Hash a password securely
 */
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

/**
 * Verify a password against a hash
 */
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

/**
 * Get user file path
 */
function getUserFilePath($username) {
    return USERS_DATA_PATH . '/' . md5($username) . '.json';
}

/**
 * Check if user exists
 */
function userExists($username) {
    return file_exists(getUserFilePath($username));
}

/**
 * Create a new user
 */
function createUser($username, $email, $password, $fullName = '') {
    if (userExists($username)) {
        return ['success' => false, 'message' => 'Username already exists'];
    }
    
    // Check if email is already registered
    $users = getAllUsers();
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            return ['success' => false, 'message' => 'Email already registered'];
        }
    }
    
    $userData = [
        'username' => $username,
        'email' => $email,
        'password' => hashPassword($password),
        'full_name' => $fullName,
        'created_at' => date('Y-m-d H:i:s'),
        'last_login' => null,
    ];
    
    $filePath = getUserFilePath($username);
    if (file_put_contents($filePath, json_encode($userData, JSON_PRETTY_PRINT))) {
        return ['success' => true, 'message' => 'User registered successfully'];
    }
    
    return ['success' => false, 'message' => 'Failed to create user'];
}

/**
 * Get user data
 */
function getUserData($username) {
    $filePath = getUserFilePath($username);
    if (!file_exists($filePath)) {
        return null;
    }
    
    $data = file_get_contents($filePath);
    return json_decode($data, true);
}

/**
 * Update user data
 */
function updateUserData($username, $data) {
    $filePath = getUserFilePath($username);
    return file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT)) !== false;
}

/**
 * Get all users (without passwords)
 */
function getAllUsers() {
    $users = [];
    $files = glob(USERS_DATA_PATH . '/*.json');
    
    foreach ($files as $file) {
        $data = json_decode(file_get_contents($file), true);
        if ($data) {
            unset($data['password']); // Don't expose passwords
            $users[] = $data;
        }
    }
    
    return $users;
}

/**
 * Authenticate user
 */
function authenticateUser($username, $password) {
    $userData = getUserData($username);
    
    if (!$userData) {
        return ['success' => false, 'message' => 'Invalid username or password'];
    }
    
    if (verifyPassword($password, $userData['password'])) {
        // Update last login
        $userData['last_login'] = date('Y-m-d H:i:s');
        updateUserData($username, $userData);
        
        // Set session variables
        $_SESSION['user_id'] = md5($username);
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $userData['email'];
        $_SESSION['full_name'] = $userData['full_name'];
        $_SESSION['logged_in_at'] = time();
        
        return ['success' => true, 'message' => 'Login successful', 'user' => $userData];
    }
    
    return ['success' => false, 'message' => 'Invalid username or password'];
}

/**
 * Logout user
 */
function logoutUser() {
    // Clear session variables
    $_SESSION = [];
    
    // Destroy session cookie
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }
    
    // Destroy session
    session_destroy();
    
    return true;
}

/**
 * Get current logged-in user data
 */
function getCurrentUser() {
    if (!isLoggedIn()) {
        return null;
    }
    
    return getUserData($_SESSION['username']);
}

/**
 * Generate CSRF token
 */
function generateCsrfToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Verify CSRF token
 */
function verifyCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
