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
</script>

<script src="<?= DIRJS; ?>core/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $('.coluna').click(function(){
      let endpoint = $(this).data("endpoint");
      let search   = $(this).data('search'  );
      if(endpoint == 'concessao'){
        document.location.href = '<?= DIRPAGE; ?>concessoes/ver/'+search;
      }else {
        let url = document.location.href;
        document.location.href = url+'/'+endpoint+'/edit/'+search;
      }
    })
  })
</script>
