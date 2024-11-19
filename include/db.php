<?php
// $servername = "localhost:3306"; 
// $username = "mmchytli"; 
// $password = "wAPEt1Igbekq"; 
// $dbname = "mmchytli_mmcharity";
ob_start();

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "nemconsults";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
