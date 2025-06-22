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
      <div class="flex justify-start items-center mx-2 px-7 py-2 gap-2 mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
          <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
        </svg>
        <h1 class="text-2xl poppins-extrabold text-black">Transaction</h1>
      </div>

      <!-- Page Content -->
      <?php include $basePath . 'cardsTransaction.php'; ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
