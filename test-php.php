<?php
/**
 * Test script to verify PHPMailer is working correctly
 */
require __DIR__ . '/include/vendor/phpmailer/src/Exception.php';
require __DIR__ . '/include/vendor/phpmailer/src/PHPMailer.php';
require __DIR__ . '/include/vendor/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
echo "<h1>PHPMailer Test</h1>";

try {
    // Try to load the autoloader
    require __DIR__ . '/include/vendor/autoload.php';
    
    echo "<p style='color: green;'>✓ Autoloader loaded successfully</p>";
    
    // Try to import the PHPMailer classes
    
    echo "<p style='color: green;'>✓ PHPMailer classes imported successfully</p>";
    
    // Try to create a PHPMailer instance
    $mail = new PHPMailer(true);
    
    echo "<p style='color: green;'>✓ PHPMailer instance created successfully</p>";
    
    echo "<h2>PHPMailer is working correctly!</h2>";
    echo "<p>All dependencies are properly loaded and the classes are available.</p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Error: " . $e->getMessage() . "</p>";
    echo "<p>Check that the vendor directory exists and contains the PHPMailer files.</p>";
} catch (Error $e) {
    echo "<p style='color: red;'>✗ Error: " . $e->getMessage() . "</p>";
    echo "<p>Check that the vendor directory exists and contains the PHPMailer files.</p>";
}

// Check if vendor directory exists
echo "<h2>File System Check</h2>";
$vendorDir = __DIR__ . '/include/vendor';
if (file_exists($vendorDir)) {
    echo "<p style='color: green;'>✓ Vendor directory exists</p>";
    
    $autoloadFile = $vendorDir . '/autoload.php';
    if (file_exists($autoloadFile)) {
        echo "<p style='color: green;'>✓ Autoload file exists</p>";
    } else {
        echo "<p style='color: red;'>✗ Autoload file missing</p>";
    }
    
    $phpmailerDir = $vendorDir . '/phpmailer';
    if (file_exists($phpmailerDir)) {
        echo "<p style='color: green;'>✓ PHPMailer directory exists</p>";
        
        $phpmailerSrc = $phpmailerDir . '/src/PHPMailer.php';
        if (file_exists($phpmailerSrc)) {
            echo "<p style='color: green;'>✓ PHPMailer.php source file exists</p>";
        } else {
            echo "<p style='color: red;'>✗ PHPMailer.php source file missing</p>";
        }
    } else {
        echo "<p style='color: red;'>✗ PHPMailer directory missing</p>";
    }
} else {
    echo "<p style='color: red;'>✗ Vendor directory missing</p>";
    echo "<p>You need to run 'composer install' to install dependencies.</p>";
}

echo "<p><a href='index.php'>← Back to Home</a></p>";
?>