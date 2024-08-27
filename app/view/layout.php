<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <title><?= $this->getTitle(); ?></title>
    <meta name="keywords" content="<?= $this->getKeywords(); ?>">
    <meta name="description" content="<?= $this->getDescription(); ?>">


    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <link href="<?= DIRCSS; ?>/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= DIRCSS; ?>/nucleo-svg.css" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link id="pagestyle" href="<?= DIRCSS; ?>material-dashboard.min.css" rel="stylesheet" />

    <?= $this->addHead(); ?>
    <!-- <script defer data-site="demos.creative-tim.com" src="https://api.nepcha.com/js/nepcha-analytics.js"></script> -->
  </head>
  <body class="g-sidenav-show bg-gray-200">
    <!-- dark-version -->
    <?php 
      if($params != null) {
        // echo $this->addHeader($params);
        include_once(DIRREQ.'/app/view/include/header.php');
      }
      else {echo $this->addHeader();}

      if($params != null) {echo $this->addMain($params);}
      else {echo $this->addMain();}
    ?>
    <?php
      if($params != null) {echo $this->addFooter($params);}
      else {echo $this->addFooter();}
    ?>
    <!--   Core JS Files   -->
    <script src="<?= DIRJS; ?>core/popper.min.js"></script>
    <script src="<?= DIRJS; ?>core/bootstrap.min.js"></script>
    <script src="<?= DIRJS; ?>plugins/perfect-scrollbar.min.js"></script>
    <script src="<?= DIRJS; ?>plugins/smooth-scrollbar.min.js"></script>

    <!-- <script src="<?= DIRJS; ?>plugins/chartjs.min.js"></script>
    <script src="<?= DIRJS; ?>plugins/world.js"></script> -->
    <?php
      if($params != null) {echo $this->addFoot($params);}
      else {echo $this->addFoot();}
    ?>
    <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
          damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }

      const area_ocupada = document.getElementById('status3');
      function substituirVirgulaPorPonto(elemento) {
        // Pegue o valor atual do elemento
        let valor = elemento.textContent || elemento.innerText;
        
        // Substitua a vírgula por ponto
        valor = valor.replace(',', '.');
        
        // Atualize o conteúdo do elemento
        elemento.textContent = valor;
    }
    if(area_ocupada) {
      document.addEventListener(
        'DOMContentLoaded', 
        function() {
          setInterval(function(){substituirVirgulaPorPonto(area_ocupada);}, 2000)
      });
    }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="<?= DIRJS; ?>material-dashboard.min.js"></script>
    <!-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854" integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg==" data-cf-beacon='{"rayId":"80957b201a5b77e3","version":"2023.8.0","r":1,"token":"1b7cbb72744b40c580f8633c6b62637e","si":100}' crossorigin="anonymous"></script> -->

  </body>  
</html>
