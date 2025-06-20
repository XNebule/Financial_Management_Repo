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

// Calculate total expenses
const totalExpenses = Object.values(expensesData.categories).reduce(
  (sum, amount) => sum + amount,
  0
);
document.querySelector(
  ".total-expenses"
).textContent = `Total Pengeluaran: Rp${totalExpenses.toLocaleString("id-ID")}`;

// Prepare data for charts
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
const doughnutCtx = document.getElementById("doughnutChart").getContext("2d");
const doughnutChart = new Chart(doughnutCtx, {
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
        position: "right",
      },
      tooltip: {
        callbacks: {
          label: function (context) {
            const value = context.raw;
            const percentage = ((value / totalExpenses) * 100).toFixed(1);
            return `${context.label}: Rp${value.toLocaleString(
              "id-ID"
            )} (${percentage}%)`;
          },
        },
      },
    },
  },
});

// Horizontal Bar Chart
const barCtx = document.getElementById("barChart").getContext("2d");
const barChart = new Chart(barCtx, {
  type: "bar",
  data: {
    labels: categories,
    datasets: [
      {
        label: "Pengeluaran (Rp)",
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
          callback: function (value) {
            return "Rp" + (value / 1000000).toLocaleString("id-ID") + " jt";
          },
        },
      },
    },
    plugins: {
      tooltip: {
        callbacks: {
          label: function (context) {
            return "Rp" + context.raw.toLocaleString("id-ID");
          },
        },
      },
    },
  },
});
