<?php
ob_start();

$servername = "localhost:3306"; 
$username = "nemciewg"; 
$password = getenv('SMTP_DB_PASS'); 
$dbname = getenv('SMTP_DB_NAME');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ");
}
?>