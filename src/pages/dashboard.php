<?php
$basePath = __DIR__ . '/../components/'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>K. PWL</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="./src/css/index.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet" />
</head>

<body class="bg-slate-100 min-h-screen md:overflow-y-hidden">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <?php include $basePath . 'sidebar.php'; ?>


    <!-- Main Content -->
    <div class="flex-1 flex flex-col ">
      <!-- Header -->
      <?php include $basePath . 'header.php'; ?>


      <!-- Page Content -->
      <?php include $basePath . 'cardsDashboard.php'; ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="/src/js/contentChart.js"></script>
</body>

</html>