document.addEventListener("DOMContentLoaded", () => {
  const openBtn = document.getElementById("addTransactionBtn");
  const modal = document.getElementById("transactionModal");
  const closeBtn = modal?.querySelector("button[onclick='closeModal()']");
  const categorySelect = document.getElementById("categorySelect");
  const transactionTypeInput = document.getElementById("transactionType");
  const modalTitle = document.getElementById("modalTitle");

  const depositCategories = [
    "Salary",
    "Bonus",
    "Business Income",
    "Freelance",
    "Investment Returns",
    "Rental Income",
    "Gifts",
    "Transfers from Family / Partner",
    "Others",
  ];

  const expenseCategories = [
    "Food & Beverages",
    "Transportation",
    "Health & Medical",
    "Education",
    "Entertainment & Lifestyle",
    "Communication & Internet",
    "Loans",
    "Household Shopping",
    "Clothing & Personal Care",
    "Emergency & Unexpected Expenses",
  ];

  function getTabType() {
    const urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get("tab") || "deposit";
    return tab;
  }

  function populateCategories(tab) {
    const isDeposit = tab === "deposit";
    const categories = isDeposit ? depositCategories : expenseCategories;

    categorySelect.innerHTML =
      '<option value="">-- Select Category --</option>';
    categories.forEach((cat) => {
      const opt = document.createElement("option");
      opt.value = cat;
      opt.textContent = cat;
      categorySelect.appendChild(opt);
    });

    transactionTypeInput.value = tab;
    modalTitle.textContent = `Add ${
      tab.charAt(0).toUpperCase() + tab.slice(1)
    } Transaction`;
  }

  openBtn?.addEventListener("click", (e) => {
    e.preventDefault();
    const tab = getTabType();
    populateCategories(tab);
    modal?.classList.remove("hidden");
    modal?.classList.add("flex");
  });

  closeBtn?.addEventListener("click", () => {
    modal?.classList.add("hidden");
    modal?.classList.remove("flex");
  });
});
