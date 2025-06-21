document.addEventListener("DOMContentLoaded", function () {
  const doughnutCanvas = document.getElementById("doughnutChart");
  const barCanvas = document.getElementById("barChart");
  const doughnutCtx = doughnutCanvas.getContext("2d");
  const barCtx = barCanvas.getContext("2d");

  // Data preparation
  const expensesData = {
    year: 2025,
    categories: {
      "Makan & Minum": 4500000,
      Transportasi: 3200000,
      Kesehatan: 1800000,
      Pendidikan: 2500000,
      "Hiburan & Lifestyle": 3500000,
      "Komunikasi & Internet": 1200000,
      "Cicilan & Keuangan": 5000000,
      "Belanja Rumah Tangga": 2800000,
      "Pakaian & Perawatan Diri": 2200000,
    },
  };

  const totalExpenses = Object.values(expensesData.categories).reduce(
    (sum, amount) => sum + amount,
    0
  );

  const categories = Object.keys(expensesData.categories);
  const amounts = Object.values(expensesData.categories);
  const backgroundColors = [
    "#FF6384",
    "#36A2EB",
    "#FFCE56",
    "#4BC0C0",
    "#9966FF",
    "#FF9F40",
    "#8AC24A",
    "#F06292",
    "#7986CB",
  ];

  // Doughnut Chart
  new Chart(doughnutCtx, {
    type: "doughnut",
    data: {
      labels: categories,
      datasets: [
        {
          data: amounts,
          backgroundColor: backgroundColors,
          borderWidth: 1,
        },
      ],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false, // 🚫 This hides the top color-coded bar
        },
      },
    },
  });

  // Horizontal Bar Chart
  new Chart(barCtx, {
    type: "bar",
    data: {
      labels: categories,
      datasets: [
        {
          label: "", // remove "Pengeluaran (Rp)" label
          data: amounts,
          backgroundColor: backgroundColors,
          borderWidth: 1,
        },
      ],
    },
    options: {
      indexAxis: "y",
      responsive: true,
      scales: {
        x: {
          beginAtZero: true,
          ticks: {
            display: false, // Hide "Rp0 jt", "Rp2 jt", etc
          },
          grid: {
            drawTicks: false, // Hide tick markers
          },
        },
        y: {
          beginAtZero: true,
          ticks: {
            display: false, // 
          },
          grid: {
            drawTicks: false, // Hide tick markers
          },
        },
      },
      plugins: {
        legend: {
          display: false, // Remove the "Pengeluaran (Rp)" legend box
        },
        tooltip: {
          callbacks: {
            label: (context) => "Rp" + context.raw.toLocaleString("id-ID"),
          },
        },
      },
    },
  });
});
