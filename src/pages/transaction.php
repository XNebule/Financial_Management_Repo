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
          <table
            class="min-w-full text-sm text-left text-gray-700 bg-white shadow-md rounded-lg shadow-xl">
            <thead class="text-xs uppercase bg-[#f1f5f9] text-gray-600">
              <tr>
                <th class="px-6 py-3">No</th>
                <th class="px-6 py-3">Tanggal</th>
                <th class="px-6 py-3">Kategori</th>
                <th class="px-6 py-3">Keterangan</th>
                <th class="px-6 py-3">Pemasukan</th>
                <th class="px-6 py-3">Pengeluaran</th>
                <th class="px-6 py-3">Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr class="border-b hover:bg-gray-50">
                  <td class="px-6 py-4"><?= $no++ ?></td>
                  <td class="px-6 py-4">
                    <?= date('d-m-Y', strtotime($row['tanggal'])) ?>
                  </td>
                  <td class="px-6 py-4"><?= $row['kategori'] ?></td>
                  <td class="px-6 py-4"><?= $row['keterangan'] ?></td>
                  <td class="px-6 py-4 text-green-600">
                    <?= $row['pemasukan'] ? "Rp. " . number_format($row['pemasukan'], 0, ',', '.') : '-' ?>
                  </td>
                  <td class="px-6 py-4 text-red-600">
                    <?= $row['pengeluaran'] ? "Rp. " . number_format($row['pengeluaran'], 0, ',', '.') : '-' ?>
                  </td>
                  <td class="px-6 py-4 flex">
                    <a
                      href="edit.php?id=<?= $row['id'] ?>"
                      class="text-yellow-600 hover:underline mr-2 rounded-full bg-gray-100 p-2 hover:bg-[#7693fb]/30 transition"><svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-6 stroke-green-500">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                      </svg>
                    </a>
                    <a
                      href="hapus.php?id=<?= $row['id'] ?>"
                      onclick="return confirm('Yakin hapus?')"
                      class="text-red-600 hover:underline rounded-full bg-gray-100 p-2 hover:bg-[#7693fb]/30 transition"><svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="size-6">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                      </svg>
                    </a>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

</html>