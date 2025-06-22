<?php
require_once __DIR__ . '/../dbConnection.php';
header('Content-Type: application/json');

// Check if POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit;
}

// Validate data
$category = $_POST['category'] ?? '';
$amount = $_POST['amount'] ?? '';
$date = $_POST['date'] ?? '';
$description = $_POST['description'] ?? '';

if (empty($category) || empty($amount) || empty($date)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'All required fields must be filled.']);
    exit;
}

try {
    $stmt = $conn->prepare("INSERT INTO income (category, amount, date, description) VALUES (:category, :amount, :date, :description)");
    $stmt->execute([
        ':category' => $category,
        ':amount' => $amount,
        ':date' => $date,
        ':description' => $description
    ]);

    echo json_encode(['success' => true, 'message' => 'Inserted successfully.']);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
