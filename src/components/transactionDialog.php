<!-- Modal -->
<div id="transactionModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
        <div class="p-6 border-b flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-700">Add <?= ucfirst($tab) ?> Transaction</h2>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">&times;</button>
        </div>
        <form action="transaksi_act.php" method="POST" class="p-6 space-y-4">
            <input type="hidden" name="type" value="<?= $tab ?>">
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Category</label>
                <input type="text" name="category" required class="w-full border rounded px-3 py-2" />
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Amount</label>
                <input type="number" name="amount" required class="w-full border rounded px-3 py-2" />
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" required class="w-full border rounded px-3 py-2" />
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Description (Optional)</label>
                <textarea name="description" class="w-full border rounded px-3 py-2"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-[#7693fb] text-white px-4 py-2 rounded hover:bg-[#5f7edc] transition">Save</button>
            </div>
        </form>
    </div>
</div>