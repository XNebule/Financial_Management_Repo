<?php include __DIR__ . '/../../dbConnection.php'; ?>

<section class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-semibold">Transaction Records</h2>
        <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            + Add Transaction
        </button>
    </div>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full table-auto text-left border-collapse">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="p-4">No</th>
                    <th class="p-4">Category</th>
                    <th class="p-4">Amount</th>
                    <th class="p-4">Date</th>
                    <th class="p-4">Description</th>
                </tr>
            </thead>
            <tbody class="text-gray-800 divide-y">
                <?php
                try {
                    $stmt = $conn->query("SELECT * FROM income ORDER BY date DESC");
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if (empty($data)) {
                        echo "<tr><td colspan='5' class='p-4 text-center text-gray-500'>No data found.</td></tr>";
                    } else {
                        $no = 1;
                        foreach ($data as $row) {
                            echo "<tr>";
                            echo "<td class='p-4'>" . $no++ . "</td>";
                            echo "<td class='p-4'>" . htmlspecialchars($row['category']) . "</td>";
                            echo "<td class='p-4'>Rp " . number_format($row['amount'], 0, ',', '.') . "</td>";
                            echo "<td class='p-4'>" . htmlspecialchars($row['date']) . "</td>";
                            echo "<td class='p-4'>" . htmlspecialchars($row['description']) . "</td>";
                            echo "</tr>";
                        }
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='5' class='p-4 text-center text-red-500'>Error: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>