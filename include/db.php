<?php
ob_start();

// Load .env file manually
$envPath = __DIR__ . '/../.env';
if (file_exists($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue; // skip comments
        list($name, $value) = explode('=', $line, 2);
        putenv(trim($name) . '=' . trim($value));
    }
}

$servername = getenv('SMTP_SERVER_NAME'); ; 
$username = getenv('SMTP_USER_NAME'); ; 
$password = getenv('SMTP_DB_PASS'); 
$dbname = getenv('SMTP_DB_NAME');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ");
}
?>
