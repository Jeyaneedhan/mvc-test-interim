<?php
// Database parameters
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'rentigo_db');

// App root
define('APPROOT', dirname(dirname(__FILE__)));

// Public Root
define('PUBROOT', dirname(dirname(dirname(__FILE__))) . '\public');

// Dynamic URL detection for cross-platform compatibility (MAMP/WAMP/XAMPP)
// Detect if we're accessing through public folder or not
$requestUri = $_SERVER['REQUEST_URI'] ?? '';
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';

// Check if 'public' is in the URL path
if (strpos($scriptName, '/public/') !== false) {
    // WAMP/MAMP style: http://localhost/Rentigo/public/
    define('URLROOT', 'http://localhost/Rentigo/public');
} else {
    // Standard style: http://localhost/Rentigo/
    define('URLROOT', 'http://localhost/Rentigo');
}

// Site name
define('SITENAME', 'Rentigo');
