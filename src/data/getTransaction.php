<?php
require_once 'dbConnection.php';
header('Content-Type: application/json');

$stmt = $conn->query("SELECT * FROM transactions ORDER BY date DESC");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
