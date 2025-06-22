let doughnutChartInstance = null;
let barChartInstance = null;
let lineChartInstance = null;
let savingsChartInstance = null;
let comparisonChartInstance = null;

document.addEventListener("DOMContentLoaded", function () {
  if (doughnutChartInstance) doughnutChartInstance.destroy();
  if (barChartInstance) barChartInstance.destroy();
  if (lineChartInstance) lineChartInstance.destroy();
  if (savingsChartInstance) savingsChartInstance.destroy();
  if (comparisonChartInstance) comparisonChartInstance.destroy();


  const doughnutCanvas = document.getElementById("doughnutChart");
  const barCanvas = document.getElementById("barChart");
  const lineChart = document
    .getElementById("expensesLineChart")
    ?.getContext("2d");
  const savingsChart = document
    .getElementById("savingsDoughnutChart")
    ?.getContext("2d");
  const doughnutCtx = doughnutCanvas?.getContext("2d");
  const barCtx = barCanvas?.getContext("2d");
  const comparisonCtx = document
    .getElementById("incomeExpensesChart")
    ?.getContext("2d");

  const categories = expenseChartData.map((item) => item.category);
  const amounts = expenseChartData.map((item) => item.total);

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
    "#E57373",
  ];

  // Doughnut Chart
  if (doughnutCtx) {
    new Chart(doughnutCtx, {
      type: "doughnut",
      data: {
        labels: categories,
        datasets: [
          {
            data: amounts,
            backgroundColor: backgroundColors.slice(0, categories.length),
            borderWidth: 1,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
      },
    });
  }

  // Horizontal Bar Chart
  if (barCtx) {
    new Chart(barCtx, {
      type: "bar",
      data: {
        labels: categories,
        datasets: [
          {
            data: amounts,
            backgroundColor: backgroundColors.slice(0, categories.length),
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
            ticks: { display: false },
            grid: { drawTicks: false },
          },
          y: {
            ticks: { display: false },
            grid: { drawTicks: false },
          },
        },
        plugins: {
          legend: { display: false },
          tooltip: {
            callbacks: {
              label: (context) => "Rp" + context.raw.toLocaleString("id-ID"),
            },
          },
        },
      },
    });
  }

  // Line Chart: Monthly Expenses
  if (lineChart) {
    // Ensure data is properly formatted
    const months = monthlyExpenses.map((item) => item.month);
    const totals = monthlyExpenses.map((item) => Number(item.total)); // Force conversion to number

    new Chart(lineChart, {
      type: "line",
      data: {
        labels: months,
        datasets: [
          {
            label: "Monthly Expenses",
            data: totals,
            fill: false,
            borderColor: "#ef4444",
            backgroundColor: "#ef4444",
            tension: 0.3,
            pointBackgroundColor: "#ef4444",
            pointRadius: 5,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: (value) => `Rp${value.toLocaleString("id-ID")}`,
            },
          },
        },
      },
    });
  }

  // Savings Doughnut
  if (savingsChart) {
    new Chart(savingsChart, {
      type: "doughnut",
      data: {
        labels: ["Saved", "Spent"],
        datasets: [
          {
            label: "Savings",
            data: [savingsData.saved, savingsData.spent],
            backgroundColor: ["#10b981", "#f87171"],
            borderColor: "#fff",
            borderWidth: 3,
          },
        ],
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: "bottom",
            labels: {
              color: "#6b7280",
              font: { size: 14 },
            },
          },
        },
        cutout: "70%",
      },
    });
  }

  if (comparisonCtx && monthlyComparison) {
    // Debug log to verify data structure
    console.log("Comparison Chart Data:", {
      labels: monthlyComparison.labels,
      income: monthlyComparison.income,
      expenses: monthlyComparison.expenses,
    });

    // Convert all values to numbers and validate data
    const incomeData = monthlyComparison.income.map((val) => {
      const num = Number(val);
      return isNaN(num) ? 0 : num;
    });

    const expensesData = monthlyComparison.expenses.map((val) => {
      const num = Number(val);
      return isNaN(num) ? 0 : num;
    });

    // Verify data lengths match labels
    if (
      incomeData.length !== monthlyComparison.labels.length ||
      expensesData.length !== monthlyComparison.labels.length
    ) {
      console.error("Data length mismatch:", {
        labels: monthlyComparison.labels.length,
        income: incomeData.length,
        expenses: expensesData.length,
      });
    }

    // Create the comparison chart
    comparisonChartInstance = new Chart(comparisonCtx, {
      type: "line",
      data: {
        labels: monthlyComparison.labels,
        datasets: [
          {
            label: "Income",
            data: incomeData,
            borderColor: "#10b981",
            backgroundColor: "rgba(16, 185, 129, 0.1)",
            borderWidth: 3,
            tension: 0.1, // Reduced tension for straighter lines
            fill: true,
            pointRadius: 4,
            pointHoverRadius: 6,
            pointBackgroundColor: "#10b981",
            pointBorderColor: "#fff",
            pointBorderWidth: 2,
            borderJoinStyle: "round", // Smoother line connections
            spanGaps: true, // Connect lines across missing data
          },
          {
            label: "Expenses",
            data: expensesData,
            borderColor: "#ef4444",
            backgroundColor: "rgba(239, 68, 68, 0.1)",
            borderWidth: 3,
            tension: 0.1,
            fill: true,
            pointRadius: 4,
            pointHoverRadius: 6,
            pointBackgroundColor: "#ef4444",
            pointBorderColor: "#fff",
            pointBorderWidth: 2,
            borderJoinStyle: "round",
            spanGaps: true,
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: "top",
            align: "end",
            labels: {
              boxWidth: 12,
              padding: 20,
              usePointStyle: true,
              font: {
                size: 12,
              },
            },
          },
          tooltip: {
            callbacks: {
              label: function (context) {
                return `${
                  context.dataset.label
                }: Rp${context.raw.toLocaleString("id-ID")}`;
              },
            },
          },
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function (value) {
                return `Rp${value.toLocaleString("id-ID")}`;
              },
            },
            grid: {
              drawBorder: false,
            },
          },
          x: {
            grid: {
              display: false,
            },
          },
        },
        elements: {
          line: {
            cubicInterpolationMode: "monotone", // Better line rendering
          },
        },
      },
    });
  }
  console.log(expenseChartData, savingsData, monthlyExpenses);
  console.log(expenseChartData); // test it
});
