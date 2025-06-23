<?php
include './dbConnection.php';

// Get form data
$date = $_POST['date'];
$type = $_POST['jenis']; // Changed from 'type' to 'jenis' to match your form
$category = $_POST['category'];
$amount = $_POST['amount'];
$description = $_POST['description'];

try {
    if ($type == "income") {
        // Insert into income table
        $stmt = $conn->prepare("INSERT INTO income (category, amount, date, description) VALUES (:category, :amount, :date, :description)");
    } elseif ($type == "expenses") {
        // Insert into expenses table
        $stmt = $conn->prepare("INSERT INTO expenses (category, amount, date, description) VALUES (:category, :amount, :date, :description)");
    }

    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':amount', $amount);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':description', $description);
    $stmt->execute();

    // Redirect back to transaction page
    header("Location: cardsTransaction.php");
    exit();
} catch (PDOException $e) {
    // Handle errors
    echo "Error: " . $e->getMessage();
    // You might want to redirect to an error page or back with an error message
    // header("Location: cardsTransaction.php?error=1");
    // exit();
}
