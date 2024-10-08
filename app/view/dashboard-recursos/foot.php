<script src="<?= DIRJS; ?>plugins/choices.min.js"></script>
<script src="<?= DIRJS; ?>plugins/dragula/dragula.min.js"></script>
<script src="<?= DIRJS; ?>plugins/jkanban/jkanban.js"></script>
<script src="<?= DIRJS; ?>plugins/countup.min.js"></script>
<script src="<?= DIRJS; ?>plugins/chartjs.min.js"></script>
<script>
    // Rounded slider
    const setValue = function(value, active) {
      document.querySelectorAll("round-slider").forEach(function(el) {
        if (el.value === undefined) return;
        el.value = value;
      });
      const span = document.querySelector("#value");
      span.innerHTML = value;
      if (active)
        span.style.color = 'red';
      else
        span.style.color = 'black';
    }

    document.querySelectorAll("round-slider").forEach(function(el) {
      el.addEventListener('value-changed', function(ev) {
        if (ev.detail.value !== undefined)
          setValue(ev.detail.value, false);
        else if (ev.detail.low !== undefined)
          setLow(ev.detail.low, false);
        else if (ev.detail.high !== undefined)
          setHigh(ev.detail.high, false);
      });

      el.addEventListener('value-changing', function(ev) {
        if (ev.detail.value !== undefined)
          setValue(ev.detail.value, true);
        else if (ev.detail.low !== undefined)
          setLow(ev.detail.low, true);
        else if (ev.detail.high !== undefined)
          setHigh(ev.detail.high, true);
      });
    });

    // Count To
    if (document.getElementById('status1')) {
      const countUp = new CountUp('status1', document.getElementById("status1").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('status2')) {
      const countUp = new CountUp('status2', document.getElementById("status2").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('status3')) {
      const countUp = new CountUp('status3', document.getElementById("status3").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('status4')) {
      const countUp = new CountUp('status4', document.getElementById("status4").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('status5')) {
      const countUp = new CountUp('status5', document.getElementById("status5").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('status6')) {
      const countUp = new CountUp('status6', document.getElementById("status6").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }

    // Chart Doughnut Consumption by room
    var ctx1 = document.getElementById("chart-mineral").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    <?php
      $titulo_exploracao = 0;
      $titulo_prospeccao = 0;
      $alvara_exploracao = 0;
      $alvara_prospeccao = 0;
      foreach($params['concessoes'] as $sub_key){
        if (strpos($sub_key['titulo_mineral'], 'Título de Exploração'        ) !== false) {$titulo_exploracao++;}
        if (strpos($sub_key['titulo_mineral'], 'Título de Prospecção'        ) !== false) {$titulo_prospeccao++;}
        if (strpos($sub_key['titulo_mineral'], 'Alvará Mineral de Exploração') !== false) {$alvara_exploracao++;}
        if (strpos($sub_key['titulo_mineral'], 'Alvará Mineral de Prospecção') !== false) {$alvara_exploracao++;}
      }
      // base64_encode('Título de Exploração');
    ?>

    new Chart(ctx1, {
      type: "pie",
      data: {
        labels: ['Título de Exploração', 'Título de Prospecção', 'Alvará Mineral de Exploração', 'Alvará Mineral de Prospecção'],
        datasets: [{
          label: "Área Ocupada",
          weight: 9,
          cutout: 0,
          tension: 0.9,
          pointRadius: 2,
          borderWidth: 1,
          backgroundColor: ['#daa520', '#5e2129', '#999b9a', '#d1ccc7'],
          data: [
            <?= $titulo_exploracao; ?>, 
            <?= $titulo_prospeccao; ?>,
            <?= $alvara_exploracao; ?>,
            <?= $alvara_prospeccao; ?>
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

<script src="<?= DIRJS; ?>core/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('.coluna').click(function(){
      let endpoint = $(this).data("endpoint");
      let search = $(this).data('search');
      document.location.href = '<?= DIRPAGE; ?>dashboard/'+endpoint+'/'+search;
    })
  })
</script>
