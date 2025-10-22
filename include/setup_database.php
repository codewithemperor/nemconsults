<?php
/**
 * Database Setup Script
 * This script checks for the existence of required tables and creates them if they don't exist.
 * Run this script once to set up the database structure for the Nemconsults project.
 */

include_once 'db.php';

// Function to check if a table exists
function tableExists($conn, $tableName) {
    $result = $conn->query("SHOW TABLES LIKE '" . $tableName . "'");
    return $result->num_rows > 0;
}

// Function to create table with error handling
function createTable($conn, $tableName, $createSQL) {
    if (!tableExists($conn, $tableName)) {
        echo "Creating table: $tableName... ";
        if ($conn->query($createSQL)) {
            echo "SUCCESS\n";
            return true;
        } else {
            echo "ERROR: " . $conn->error . "\n";
            return false;
        }
    } else {
        echo "Table $tableName already exists. Skipping.\n";
        return true;
    }
}

// Array of tables to create with their SQL statements
$tables = [
    'blog' => "CREATE TABLE blog (
        id INT AUTO_INCREMENT PRIMARY KEY,
        blogHeading VARCHAR(255) NOT NULL,
        blogURL VARCHAR(255) NOT NULL,
        blogParagraph TEXT NOT NULL,
        blogMessage LONGTEXT,
        blogImage VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    'enquiries' => "CREATE TABLE enquiries (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(100) NOT NULL,
        surname VARCHAR(100) NOT NULL,
        phone_number VARCHAR(20) NOT NULL,
        email VARCHAR(255) NOT NULL,
        dob DATE NOT NULL,
        full_address TEXT NOT NULL,
        city VARCHAR(100) NOT NULL,
        country VARCHAR(100) NOT NULL,
        destination VARCHAR(100) NOT NULL,
        study_level VARCHAR(100) NOT NULL,
        study_plan_date VARCHAR(100) NOT NULL,
        funding VARCHAR(100) NOT NULL,
        budget VARCHAR(50) NOT NULL,
        sponsor_name VARCHAR(255) NOT NULL,
        sponsor_number VARCHAR(20) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    'contact' => "CREATE TABLE contact (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(100) NOT NULL,
        surname VARCHAR(100) NOT NULL,
        phone_number VARCHAR(20) NOT NULL,
        email VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        sent_date DATETIME NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    'consulationPayments' => "CREATE TABLE consulationPayments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        package VARCHAR(255) NOT NULL,
        surname VARCHAR(100) NOT NULL,
        otherName VARCHAR(100) NOT NULL,
        phoneNumber VARCHAR(20) NOT NULL,
        email VARCHAR(255) NOT NULL,
        appointmentDate DATE NOT NULL,
        address TEXT NOT NULL,
        visaValidity TEXT,
        visaRefusal VARCHAR(255) NOT NULL,
        visaType VARCHAR(255) NOT NULL,
        details TEXT NOT NULL,
        aboutUs VARCHAR(255) NOT NULL,
        amountPaid DECIMAL(10,2) NOT NULL,
        amountToPay DECIMAL(10,2) NOT NULL,
        paymentStatus VARCHAR(50) DEFAULT 'Pending',
        gateway VARCHAR(50) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    'traveler_details' => "CREATE TABLE traveler_details (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone_number VARCHAR(20) NOT NULL,
        passport_number VARCHAR(50) NOT NULL,
        dob DATE NOT NULL,
        citizenship_country VARCHAR(100) NOT NULL,
        gender VARCHAR(20) NOT NULL,
        city_residence VARCHAR(100) NOT NULL,
        address TEXT NOT NULL,
        postal_code VARCHAR(20) NOT NULL,
        interview_date DATE,
        applying_embassy VARCHAR(100),
        referral VARCHAR(255),
        amount_paid DECIMAL(10,2) NOT NULL,
        payment_status VARCHAR(50) DEFAULT 'Pending',
        payment_gateway VARCHAR(50) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    'flight_details' => "CREATE TABLE flight_details (
        id INT AUTO_INCREMENT PRIMARY KEY,
        traveler_id INT NOT NULL,
        departure_date DATE NOT NULL,
        departing_city VARCHAR(100) NOT NULL,
        returning_date DATE NOT NULL,
        returning_city VARCHAR(100) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (traveler_id) REFERENCES traveler_details(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    'hotel_details' => "CREATE TABLE hotel_details (
        id INT AUTO_INCREMENT PRIMARY KEY,
        traveler_id INT NOT NULL,
        city_location VARCHAR(100) NOT NULL,
        check_in_date DATE NOT NULL,
        check_out_date DATE NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (traveler_id) REFERENCES traveler_details(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    'insurance_details' => "CREATE TABLE insurance_details (
        id INT AUTO_INCREMENT PRIMARY KEY,
        traveler_id INT NOT NULL,
        country_traveling_from VARCHAR(100) NOT NULL,
        trip_start_date DATE NOT NULL,
        trip_end_date DATE NOT NULL,
        beneficiary_name VARCHAR(255) NOT NULL,
        beneficiary_relationship VARCHAR(100) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (traveler_id) REFERENCES traveler_details(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    'free_counselling' => "CREATE TABLE free_counselling (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(100) NOT NULL,
        surname VARCHAR(100) NOT NULL,
        phone_number VARCHAR(20) NOT NULL,
        email VARCHAR(255) NOT NULL,
        destination VARCHAR(100) NOT NULL,
        study_level VARCHAR(100) NOT NULL,
        plan_to_study VARCHAR(100) NOT NULL,
        funding VARCHAR(100) NOT NULL,
        sent_date DATETIME NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"
];

// HTML header for web output
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Database Setup - Nemconsults</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #32cd30;
            text-align: center;
            margin-bottom: 30px;
        }
        .log {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            padding: 15px;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            white-space: pre-wrap;
            max-height: 400px;
            overflow-y: auto;
        }
        .success {
            color: #28a745;
            font-weight: bold;
        }
        .error {
            color: #dc3545;
            font-weight: bold;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #32cd30;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h1>Database Setup</h1>
        <div class='log'>";

// Start the setup process
echo "Starting database setup...\n\n";
echo "Database connection: " . ($conn ? "SUCCESS" : "FAILED") . "\n\n";

$successCount = 0;
$totalTables = count($tables);

foreach ($tables as $tableName => $sql) {
    if (createTable($conn, $tableName, $sql)) {
        $successCount++;
    }
    echo "\n";
}

// Summary
echo "\n" . str_repeat("=", 50) . "\n";
echo "SETUP COMPLETE\n";
echo str_repeat("=", 50) . "\n";
echo "Total tables processed: $totalTables\n";
echo "Successfully created: $successCount\n";
echo "Already existed: " . ($totalTables - $successCount) . "\n";

if ($successCount === $totalTables) {
    echo "\n<span class='success'>✓ All tables are ready! Your database is properly configured.</span>\n";
} else {
    echo "\n<span class='error'>✗ Some tables may not have been created correctly. Please check the error messages above.</span>\n";
}

echo "</div>";

// Add a back link to admin dashboard
echo "<a href='../admin/index.php' class='back-link'>← Back to Admin Dashboard</a>";

echo "</div>
</body>
</html>";

// Close database connection
$conn->close();
?>