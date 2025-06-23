<?php
include './dbConnection.php';

// Get form data
$id = $_POST['id'];
$type = $_POST['type']; // 'income' or 'expenses'
$date = $_POST['date'];
$category = $_POST['category'];
$amount = $_POST['amount'];
$description = $_POST['description'];

try {
    if ($type == "income") {
        // Update income table
        $stmt = $conn->prepare("UPDATE income SET category = :category, amount = :amount, date = :date, description = :description WHERE id = :id");
    } elseif ($type == "expenses") {
        // Update expenses table
        $stmt = $conn->prepare("UPDATE expenses SET category = :category, amount = :amount, date = :date, description = :description WHERE id = :id");
    }

    $stmt->bindParam(':id', $id);
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
