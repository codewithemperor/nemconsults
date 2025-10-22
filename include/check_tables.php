<?php
/**
 * Table Verification Script
 * This script checks if all required database tables exist and provides a status report.
 */

include_once 'db.php';

// Required tables for the project
$requiredTables = [
    'blog',
    'enquiries',
    'contact',
    'consulationPayments',
    'traveler_details',
    'flight_details',
    'hotel_details',
    'insurance_details',
    'free_counselling'
];

// Function to check if a table exists
function tableExists($conn, $tableName) {
    $result = $conn->query("SHOW TABLES LIKE '" . $tableName . "'");
    return $result->num_rows > 0;
}

// HTML header
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Database Tables Check - Nemconsults</title>
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
        .table-list {
            list-style: none;
            padding: 0;
        }
        .table-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            margin: 8px 0;
            border-radius: 5px;
            border-left: 4px solid;
        }
        .exists {
            background-color: #d4edda;
            border-left-color: #28a745;
            color: #155724;
        }
        .missing {
            background-color: #f8d7da;
            border-left-color: #dc3545;
            color: #721c24;
        }
        .status {
            font-weight: bold;
        }
        .summary {
            margin-top: 30px;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .setup-link {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #32cd30;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .setup-link:hover {
            background-color: #28a745;
            color: white;
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
        <h1>Database Tables Status Check</h1>
        
        <div class='table-list'>";

$existingTables = 0;
$totalTables = count($requiredTables);

foreach ($requiredTables as $tableName) {
    $exists = tableExists($conn, $tableName);
    $statusClass = $exists ? 'exists' : 'missing';
    $statusText = $exists ? '✓ EXISTS' : '✗ MISSING';
    
    if ($exists) {
        $existingTables++;
    }
    
    echo "<div class='table-item $statusClass'>
        <span><strong>$tableName</strong></span>
        <span class='status'>$statusText</span>
    </div>";
}

echo "</div>";

// Summary
$missingTables = $totalTables - $existingTables;
if ($missingTables === 0) {
    echo "<div class='summary success'>
        ✓ All required tables exist! Your database is ready.
    </div>";
} else {
    echo "<div class='summary error'>
        ✗ $missingTables table(s) are missing. Please run the setup script.
        <br>
        <a href='setup_database.php' class='setup-link'>Run Database Setup</a>
    </div>";
}

// Additional information
echo "<div style='margin-top: 30px; padding: 15px; background-color: #f8f9fa; border-radius: 5px;'>
    <h3>Database Information:</h3>
    <p><strong>Total Tables Required:</strong> $totalTables</p>
    <p><strong>Tables Found:</strong> $existingTables</p>
    <p><strong>Tables Missing:</strong> $missingTables</p>
    <p><strong>Database Connection:</strong> " . ($conn ? "Connected" : "Failed") . "</p>
    
    <h4 style='margin-top: 15px;'>Note:</h4>
    <ul style='margin: 10px 0; padding-left: 20px;'>
        <li>The admin panel queries 'enquiries' table as 'apply_now'</li>
        <li>'consulationPayments' has a typo in the name (consulation instead of consultation)</li>
        <li>Travel-related tables (flight_details, hotel_details, insurance_details) are linked to traveler_details</li>
    </ul>
</div>";

echo "<a href='../admin/index.php' class='back-link'>← Back to Admin Dashboard</a>";

echo "</div>
</body>
</html>";

// Close database connection
$conn->close();
?>