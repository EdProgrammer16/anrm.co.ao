<?php 
          $valor_invest = 10000;
          $ganho_dia    = 0;
          $percent      = 0.2;
          $mes          = 30;
          $mao_aposta   = 0.025;
          $mao_dia      = 0;
          $mao_por_vez  = 0;

          echo "Dia 0:";
          echo '<br>';
          echo "Ganho: ".$ganho_dia."Kz";
          echo " <==> Investimento: ".$valor_invest."Kz";
          echo '<br>';
          for($i = 1; $i <= $mes; $i++){
            $ganho_dia     = $valor_invest*$percent;
            $mao_dia       = $valor_invest*$mao_aposta;
            $mao_por_vez   =  $ganho_dia/$mao_dia;
            $valor_invest += $ganho_dia;
            
            echo "Dia ".$i.":";
            echo '<br>';
            echo "Ganho: ".$ganho_dia."Kz";
            echo " <> Invest.: ".$valor_invest."Kz";
            echo " <> Mão Aposta:".$mao_dia."Kz";
            echo " <> Mão Vez:".$mao_por_vez."Vezes";
            echo '<br>';
          }
?>