<body>
    <h1>Transactions</h1>
    <button onclick="openModal()">+ Add</button>

    <table border="1" width="100%" id="transactionTable">
        <thead>
            <tr>
                <th>Category</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <!-- Modal -->
    <div id="modal" class="hidden">
        <form id="transactionForm">
            <h2>Add Transaction</h2>
            <input name="category" placeholder="Category" required><br>
            <input type="number" name="amount" placeholder="Amount" required><br>
            <input type="date" name="date" required><br>
            <textarea name="description" placeholder="Description"></textarea><br>
            <button type="submit">Save</button>
            <button type="button" onclick="closeModal()">Cancel</button>
        </form>
    </div>

    <script>
        const modal = document.getElementById("modal");
        const form = document.getElementById("transactionForm");

        function openModal() {
            modal.classList.remove("hidden");
        }

        function closeModal() {
            modal.classList.add("hidden");
        }

        async function loadTransactions() {
            const res = await fetch('getTransactions.php');
            const data = await res.json();
            const tbody = document.querySelector("#transactionTable tbody");
            tbody.innerHTML = '';
            data.forEach(row => {
                tbody.innerHTML += `
          <tr>
            <td>${row.category}</td>
            <td>Rp ${Number(row.amount).toLocaleString()}</td>
            <td>${row.date}</td>
            <td>${row.description || '-'}</td>
          </tr>`;
            });
        }

        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            const formData = new FormData(form);
            const res = await fetch('insertTransaction.php', {
                method: 'POST',
                body: formData
            });
            const result = await res.json();
            if (result.success) {
                closeModal();
                form.reset();
                loadTransactions();
            } else {
                alert(result.message);
            }
        });

        loadTransactions();
    </script>
</body>