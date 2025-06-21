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

<body class="bg-slate-100 poppins-extrabold">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <?php include $basePath . 'sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Header -->
      <?php include $basePath . 'header.php'; ?>

      <div class="container mx-9">
        <h1 class="text-3xl font-bold mb-4 text-[#7693fb]">Transactions</h1>
        <div class="flex gap-4">
          <a
            href="tambah.php"
            class="bg-white text-black hover:text-[#7693fb] hover:bg-[#7693fb]/20 px-7 py-2 rounded shadow-xl transition">Tambah Transaksi</a>

          <a
            href="tambah.php"
            class="bg-white text-black hover:text-[#7693fb] hover:bg-[#7693fb]/20 px-7 py-2 rounded shadow-xl transition">Kategori</a>
        </div>

        <div class="overflow-x-auto mt-6">

        </div>
      </div>
    </div>
  </div>
</body>

</html>