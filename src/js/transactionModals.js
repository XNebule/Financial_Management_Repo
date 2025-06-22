document.addEventListener("DOMContentLoaded", () => {
  const openBtn = document.getElementById("addTransactionBtn");
  const modal = document.getElementById("transactionModal");
  const closeBtn = modal?.querySelector("button[onclick='closeModal()']");

  openBtn?.addEventListener("click", (e) => {
    e.preventDefault();
    modal?.classList.remove("hidden");
    modal?.classList.add("flex");
  });

  closeBtn?.addEventListener("click", () => {
    modal?.classList.add("hidden");
    modal?.classList.remove("flex");
  });
});
