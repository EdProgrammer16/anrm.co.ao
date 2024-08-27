<script src="<?= DIRJS; ?>plugins/chartjs.min.js"></script>
<script>
  // Chart Doughnut Consumption by room
  var ctx1 = document.getElementById("chart-trabalho").getContext("2d");
  var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

  gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
  gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
  gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

  new Chart(ctx1, {
    type: "doughnut",
    data: {
      labels: ['Homens Nacionais', 'Homens Estrangeiros', 'Mulheres Nacionais', 'Mulheres Estrageiros'],
      datasets: [{
        label: "Recursos Explorados",
        weight: 9,
        cutout: 30,
        tension: 0.9,
        pointRadius: 2,
        borderWidth: 0,
        backgroundColor: ['#328bed', '#5f6776', '#e22e6d', '#fd9a13'],
        data: [
            <?= $params['concessao'][0]['homens_nacionais'    ];?>, 
            <?= $params['concessao'][0]['homens_estrangeiros'  ];?>, 
            <?= $params['concessao'][0]['mulheres_nacionais'  ];?>, 
            <?= $params['concessao'][0]['mulheres_estrangeiros'];?>
        ],
        fill: false
      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: false,
        }
      },
      interaction: {
        intersect: false,
        mode: 'index',
      },
      scales: {
        y: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
          },
          ticks: {
            display: false
          }
        },
        x: {
          grid: {
            drawBorder: false,
            display: false,
            drawOnChartArea: false,
            drawTicks: false,
          },
          ticks: {
            display: false,
          }
        },
      },
    },
});
</script>