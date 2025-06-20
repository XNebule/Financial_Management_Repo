<?php
// Default to 'dashboard' if no ?page= is provided
$page = $_GET['page'] ?? 'dashboard';

// Whitelist of allowed pages to prevent file injection
$allowedPages = ['dashboard', 'transaction'];

if (!in_array($page, $allowedPages)) {
  $page = 'dashboard';
}

// Include page from src/pages
include __DIR__ . "/src/pages/{$page}.php";
?>