<?php
include __DIR__ . '/../../dbConnection.php';

// Total Income
$incomeStmt = $conn->query("SELECT SUM(amount) AS total_income FROM income");
$incomeTotal = $incomeStmt->fetch(PDO::FETCH_ASSOC)['total_income'] ?? 0;

// Total Expenses
$expensesStmt = $conn->query("SELECT SUM(amount) AS total_expenses FROM expenses");
$expenseTotal = $expensesStmt->fetch(PDO::FETCH_ASSOC)['total_expenses'] ?? 0;

// Balance
$balance = $incomeTotal - $expenseTotal;

// Monthly Income
$monthlyIncomeStmt = $conn->query("
    SELECT SUM(amount) AS monthly_income 
    FROM income 
    WHERE date_trunc('month', date) = date_trunc('month', CURRENT_DATE)
");
$monthlyIncome = $monthlyIncomeStmt->fetch(PDO::FETCH_ASSOC)['monthly_income'] ?? 0;

// Top Income Source
$topIncomeStmt = $conn->query("
    SELECT category, SUM(amount) AS total 
    FROM income 
    GROUP BY category 
    ORDER BY total DESC 
    LIMIT 1
");
$topIncomeCategory = $topIncomeStmt->fetch(PDO::FETCH_ASSOC)['category'] ?? "—";

// Expenses by category (for charts)
$expensesByCategoryStmt = $conn->query("
    SELECT category, SUM(amount) AS total 
    FROM expenses 
    GROUP BY category 
    ORDER BY total DESC
");
$expensesChartData = $expensesByCategoryStmt->fetchAll(PDO::FETCH_ASSOC);

// Monthly Income Data (last 12 months)
// In dashboardLogic.php
$monthlyIncomeData = $conn->query("
    SELECT 
        TO_CHAR(date, 'Mon') AS month,
        EXTRACT(MONTH FROM date) AS month_num,
        SUM(amount) AS total
    FROM income
    WHERE date >= date_trunc('month', CURRENT_DATE) - INTERVAL '11 months'
    GROUP BY month, month_num
    ORDER BY month_num
")->fetchAll(PDO::FETCH_ASSOC);

// Make sure the date range is the same for expenses
$monthlyExpensesData = $conn->query("
    SELECT 
        TO_CHAR(date, 'Mon') AS month,
        EXTRACT(MONTH FROM date) AS month_num,
        SUM(amount) AS total
    FROM expenses
    WHERE date >= date_trunc('month', CURRENT_DATE) - INTERVAL '11 months'
    GROUP BY month, month_num
    ORDER BY month_num
")->fetchAll(PDO::FETCH_ASSOC);

// Prepare combined data for the chart
$monthlyComparison = [
    'labels' => array_column($monthlyIncomeData, 'month'),
    'income' => array_map('floatval', array_column($monthlyIncomeData, 'total')),
    'expenses' => array_map('floatval', array_column($monthlyExpensesData, 'total'))
];
