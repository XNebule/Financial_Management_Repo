<?php
$basePath = __DIR__ . '/../components/';
$tab = $_GET['tab'] ?? 'deposit'; // Default to 'deposit'
?>

<body class="">
    <div class="flex justify-between items-center px-7 poppins-extrabold">
        <div class="flex mx-2 gap-2 mb-4 poppins-extrabold">
            <a
                href="?page=transaction&tab=deposit"
                class="group flex items-center justify-center gap-3 p-2 rounded-md hover:bg-[#7693fb]/20 hover:shadow-xl transition">
                <h1 class="group-hover:text-[#7693fb] transition">Income</h1>
            </a>
            <a
                href="?page=transaction&tab=withdraw"
                class="group flex items-center justify-center gap-3 p-2 rounded-md hover:bg-[#7693fb]/20 hover:shadow-xl transition">
                <h1 class="group-hover:text-[#7693fb] transition">Expenses</h1>
            </a>
            <a
                href="?page=transaction&tab=all"
                class="group flex items-center justify-center gap-3 p-2 rounded-md hover:bg-[#7693fb]/20 hover:shadow-xl transition">
                <h1 class="group-hover:text-[#7693fb] transition">All Transaction</h1>
            </a>
        </div>
        <a href="#"
            id="addTransactionBtn"
            class="group flex items-center justify-center gap-3 p-2 rounded-full hover:bg-[#7693fb]/20 hover:shadow-xl transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6 group-hover:stroke-[#7693fb] transition">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
        </a>
    </div>
    <div class="mt-4">
        <?php
        switch ($tab) {
            case 'deposit':
                include $basePath . 'depositTable.php';
                break;
            case 'withdraw':
                include $basePath . 'withdrawTable.php';
                break;
            case 'all':
                include $basePath . 'allTransactionTable.php';
                break;
            default:
                echo "<p class='text-center text-red-500'>Invalid tab selected.</p>";
        }
        ?>
    </div>

    <?php include $basePath . 'transactionModals.php'; ?>
</body>