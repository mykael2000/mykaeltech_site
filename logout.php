<?php
/**
 * Logout Page
 * Logs out the user and redirects to home page
 */
require_once 'includes/config.php';
require_once 'includes/auth/functions.php';

// Logout user
logoutUser();

// Redirect to home page
header('Location: /index.php?logged_out=1');
exit;
