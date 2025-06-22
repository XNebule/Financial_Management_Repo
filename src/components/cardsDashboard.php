<?php include __DIR__ . '/../../dbConnection.php'; ?>
<?php include __DIR__ . '/dashboardLogic.php'; ?>

<main class="flex-1">
    <div class="grid grid-cols-2 md:grid-cols-3 gap-10 md:gap-6 px-8 mb-5 poppins-extrabold items-stretch">
        <!-- Your Balance -->
        <div class="shadow-xl rounded-lg bg-white col-span-2 md:col-span-1 flex flex-col">
            <div class="p-5 md:p-6 md:flex text-black md:justify-between items-center mb-3">
                <div class="flex items-center gap-5 md:gap-2">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="size-[1rem] md:size-6 stroke-[#7693fb]">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                    <p class="md:hidden text-lg">Balance</p>
                    <p class="hidden md:block text-lg">Your Balance</p>
                </div>
                <div class="">
                    <h4 class="text-xl text-[#7693fb]">$<?= number_format($balance ?? 0, 0, ',', '.') ?></h4>
                </div>
            </div>


            <!-- bottom part -->
            <div class="border-t border-gray-200 mt-auto px-6 py-2 flex items-center justify-between text-sm">
                <div class="flex items-center gap-2 text-gray-600">
                    <svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 20V12M16 12L19 15M16 12L13 15" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M4 14L12 6L15 9L20 4" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p class="text-[13px]">12.9% last month</p>
                </div>
                <a href="#" class="text-blue-500 hover:underline text-[13px] font-medium">View Details</a>
            </div>
        </div>

        <!-- Income Card -->
        <div class="shadow-xl rounded-lg bg-white flex flex-col">
            <div class="p-6 flex flex-col justify-between h-full text-black flex-grow">
                <!-- Top Section -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-banknote-arrow-up-icon lucide-banknote-arrow-up text-green-500">
                            <path
                                d="M12 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5" />
                            <path d="M18 12h.01" />
                            <path d="M19 22v-6" />
                            <path d="m22 19-3-3-3 3" />
                            <path d="M6 12h.01" />
                            <circle cx="12" cy="12" r="2" />
                        </svg>
                        <p class="text-lg font-semibold">Income</p>
                    </div>
                    <div>
                        <h4 class="text-xl text-green-500 font-bold">+ $<?= number_format($incomeTotal ?? 0, 0, ',', '.') ?></h4>
                    </div>
                </div>

                <!-- Bottom Insight Section -->
                <div class="flex justify-between">
                    <div class="px-3">
                        <p class="text-lg text-gray-500 poppins-thin">This Month</p>
                        <h1 class="text-xl poppins-extrabold">$<?= number_format($monthlyIncome ?? 0, 0, ',', '.') ?></h1>
                    </div>
                    <div class="px-3">
                        <p class="text-lg text-gray-500 poppins-thin">Top Source</p>
                        <h1 class="text-xl poppins-extrabold"><?= $topIncomeCategory ?? '—' ?></h1>
                    </div>
                </div>
                <div class="border-b border-gray-200 -mb-10"></div>
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-2 text-gray-600">
                        <svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 20V12M16 12L19 15M16 12L13 15" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M4 14L12 6L15 9L20 4" stroke="currentColor"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <p class="text-[13px]">12.9% last month</p>
                    </div>
                    <a href="#" class="text-blue-500 hover:underline text-[13px] font-medium">View Details</a>
                </div>
            </div>
        </div>

        <!-- Expenses Card -->
        <div class="shadow-xl rounded-lg bg-white flex flex-col">
            <div class="p-6 flex flex-col justify-between gap-4 text-black flex-grow">
                <!-- Top Section -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-banknote-arrow-down-icon text-red-500">
                            <path d="M12 18H4a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5" />
                            <path d="m16 19 3 3 3-3" />
                            <path d="M18 12h.01" />
                            <path d="M19 16v6" />
                            <path d="M6 12h.01" />
                            <circle cx="12" cy="12" r="2" />
                        </svg>
                        <p class="text-lg font-semibold">Expenses</p>
                    </div>
                    <h4 class="text-xl text-red-500 font-bold">- $<?= number_format($expenseTotal ?? 0, 0, ',', '.') ?></h4>
                </div>

                <!-- Middle: Charts -->
                <div class="flex items-center justify-between p-4 mx-10">
                    <!-- Doughnut -->
                    <div class="w-[6rem]">
                        <canvas id="doughnutChart" class=""></canvas>
                    </div>

                    <!-- Bar -->
                    <div class="w-[12rem]">
                        <canvas id="barChart" class=""></canvas>
                    </div>
                </div>

                <div class="border-b border-gray-200 "></div>
                <div class="flex items-center justify-between text-sm ">
                    <div class="flex items-center gap-2 text-gray-600">
                        <svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000">
                            <path d="M4 10L12 18L15 15L20 20"
                                stroke="#000000" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M16 4V12M16 12L19 9M16 12L13 9"
                                stroke="#000000" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <p class="text-[13px]">12.9% last month</p>
                    </div>
                    <a href="#" class="text-blue-500 hover:underline text-[13px] font-medium">View Details</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Analytics -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 px-8 mb-8 poppins-extrabold">

        <!-- Savings -->
        <div class="shadow-xl rounded-lg bg-white flex flex-col">
            <div class="p-6 flex text-black justify-between items-center">
                <div class="flex items-center gap-2">
                    <svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000">
                        <path d="M16 20V12M16 12L19 15M16 12L13 15"
                            stroke="#000000" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M4 14L12 6L15 9L20 4"
                            stroke="#000000" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p class="text-lg">Savings</p>
                </div>
            </div>

            <div class="px-6 pb-4">
                <canvas id="savingsDoughnutChart" width="250" height="250"></canvas>
            </div>

            <div class="border-t border-gray-200 mt-auto px-6 py-2 flex items-center justify-between text-sm">
                <div class="flex items-center gap-2 text-gray-600">
                    <svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 20V12M16 12L19 15M16 12L13 15"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M4 14L12 6L15 9L20 4"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p class="text-[13px]">12.9% last month</p>
                </div>
                <a href="#" class="text-blue-500 hover:underline text-[13px] font-medium">View Details</a>
            </div>
        </div>

        <!-- Analytics -->
        <div class="col-span-3 shadow-xl rounded-lg bg-white flex flex-col">
            <div class="p-6 flex text-black justify-between items-center">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                    </svg>

                    <p class="text-lg">Analytics</p>
                </div>
            </div>

            <div class="p-5" style="height: 300px;">
                <canvas id="incomeExpensesChart"></canvas>
            </div>

            <div class="border-t border-gray-200 mt-auto px-6 py-2 flex items-center justify-between text-sm">
                <div class="flex items-center gap-2 text-gray-600">
                    <svg width="20" height="20" stroke-width="1.5" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 20V12M16 12L19 15M16 12L13 15"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M4 14L12 6L15 9L20 4"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <p class="text-[13px]">12.9% last month</p>
                </div>
                <a href="#" class="text-blue-500 hover:underline text-[13px] font-medium">View Details</a>
            </div>
        </div>

    </div>

    <!-- At the end of your cardsDashboard.php, before closing main tag -->
    <script>
        const expenseChartData = <?= json_encode($expensesChartData ?? []) ?>;
        const savingsData = {
            saved: <?= $balance ?? 0 ?>,
            spent: <?= $expenseTotal ?? 0 ?>
        };

        // Ensure monthlyExpenses has proper structure
        const monthlyExpenses = <?= json_encode(array_map(function ($item) {
                                    return [
                                        'month' => $item['month'],
                                        'total' => (float)$item['total']
                                    ];
                                }, $monthlyExpensesData ?? [])) ?>;

        // Properly format comparison data
        const monthlyComparison = {
            labels: <?= json_encode(array_column($monthlyIncomeData ?? [], 'month')) ?>,
            income: <?= json_encode(array_map('floatval', array_column($monthlyIncomeData ?? [], 'total'))) ?>,
            expenses: <?= json_encode(array_map('floatval', array_column($monthlyExpensesData ?? [], 'total'))) ?>
        };
    </script>
    <!-- Then load the script that uses these variables -->
    <script src="/src/js/contentChart.js"></script>
</main>