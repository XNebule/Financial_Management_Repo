<?php
include './dbConnection.php';

// Get parameters
$type = $_GET['type']; // 'income' or 'expenses'
$id = $_GET['id'];

try {
    if ($type == "income") {
        // Delete from income table
        $stmt = $conn->prepare("DELETE FROM income WHERE id = :id");
    } elseif ($type == "expenses") {
        // Delete from expenses table
        $stmt = $conn->prepare("DELETE FROM expenses WHERE id = :id");
    }

    $stmt->bindParam(':id', $id);
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
