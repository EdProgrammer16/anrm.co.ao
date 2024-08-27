<?php 

function formatar_data($data) {
  if(strtotime($data) < 0){ return 'Indisponivel';}
  $meses = [
    'Janeiro',
    'Fevereiro',
    'Março',
    'Abril',
    'Maio',
    'Junho',
    'Julho',
    'Agosto',
    'Setembro',
    'Outubro',
    'Novembro',
    'Dezembro'
  ];

  $array_data = explode('-', $data);
  $ano        = $array_data[0];
  $mes        = $array_data[1];
  $dia        = $array_data[2];

  return $dia."/".$meses[$mes-1]."/".$ano;

}
?>