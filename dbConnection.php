<?php

try {
    // MYSQL
    // $conn = new PDO("mysql:host=localhost;dbname=financial_app", "your_user", "your_pass");

    // PSQL
    $conn = new PDO("pgsql:host=localhost;port=18274;dbname=spendwise", "development", "143000321");

    // Enable exception mode
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo "Connected successfully"; // Uncomment for testing
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
