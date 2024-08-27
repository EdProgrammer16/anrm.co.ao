<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-lg-12">
        <h1 class="text-uppercase text-center">ANRM - Relatório Geral</h1>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-3 col-sm-6 col-6">
        <div class="card">
          <div class="card-body text-center px-0">
            <h1 class="text-gradient text-primary"><span id="status1" countto="<?= count($params['concessoes']); ?>"><?= count($params['concessoes']); ?></span></h1>
            <h3 class="mb-0 font-weight-bolder">Total Concessões</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6">
        <div class="card">
          <div class="card-body text-center">
            <?php
              $num_postos = 0;
              foreach($params['concessoes'] as $key){
                $num_postos += $key['homens_nacionais'     ];
                $num_postos += $key['homens_estrangeiros'  ];
                $num_postos += $key['mulheres_nacionais'   ];
                $num_postos += $key['mulheres_estrangeiros'];
              }
            ?>
            <h1 class="text-gradient text-primary"> <span id="status2" countto="<?= $num_postos; ?>"><?= $num_postos; ?></span></h1>
            <h3 class="mb-0 font-weight-bolder">Postos De Trablho</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6 mt-4 mt-md-0">
        <div class="card">
          <div class="card-body text-center">
            <?php
              $area_ocupada = 0;
              foreach($params['concessoes'] as $key){
                $key['area_ocupada'] =  explode(' ', $key['area_ocupada']);
                $area_ocupada += intval($key['area_ocupada'][0]);
              }
            ?>
            <h1 class="text-gradient text-primary">
              <span id="status3" countto="<?= $area_ocupada; ?>"><?= $area_ocupada; ?></span> 
              <span class="text-lg ms-n2">Km²</span>
            </h1>
            <h3 class="mb-0 font-weight-bolder">Área Ocupada</h3>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6 mt-4 mt-md-0">
        <div class="card">
          <div class="card-body text-center">
            <h1 class="text-gradient text-primary"><span id="status4" countto="<?= count($params['recursos']); ?>"><?= count($params['recursos']); ?></span></h1>
            <h3 class="mb-0 font-weight-bolder">Recursos Minerais</h3>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-lg-12">
        <h3 class="m-3">Numero de Concessões nas Províncias</h3>
      </div>
      <div class="col-lg-12">
        <div class="card z-index-2">
          <div class="card-body p-3 pt-0">
            <div class="table-responsive w-100">
              <table class="table align-items-center mb-0" style="overflow: hidden">
                <tbody>
                  <?php
                  $a = 0; 
                  foreach($params['provincias'] as $key):
                    if($a==0)
                      echo '<tr>'; 
                  ?>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-lg text-uppercase"><?= $key['pro_titulo']?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm border">
                      <?php 
                        $total_concessoes = 0;
                        foreach($params['concessoes'] as $sub_key){
                            if($key['pro_titulo'] == $sub_key['provincia']){
                              $total_concessoes++; 
                            }
                        }
                      ?>
                      <span class="font-weight-bold text-lg"> <?= $total_concessoes; ?> </span>
                    </td>
                <?php
                  $a++; 
                  if($a==4){
                    echo '</tr>';
                    $a = 0;
                  }
                endforeach; 
                ?>
                </tbody>
              </table>
            </div>
            <div class="w-75 mx-auto border-top mt-3 d-none"></div>
            <div class="chart w-50 mx-auto d-none">
              <canvas id="doughnut-provincias" class="chart-canvas" height="300"></canvas>
            </div>
          </div>
        </div>    
      </div>
      <div class="col-lg-7 mt-4 mt-lg-0 d-none">
        <!-- Área Ocupada -->
        <div class="card mt-4" style="min-height: 300px">
          <div class="card-header pb-0 p-3">
            <div class="d-flex align-items-center">
              <h5 class="mb-0">Área Ocupada</h5>
            </div>
            <h3 class="mb-0 text-sm">Concessões Mineiras</h3>
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-5 text-center">
                <div class="chart">
                  <canvas id="chart-area" class="chart-canvas" height="197"></canvas>
                </div>
                <h6 class="font-weight-bold mt-n8">
                  <span><?php 
                  $num_dif = (1247000 - $area_ocupada); 
                  $str_dif = ''.$num_dif.'';
                  $new_dif = '';
                  $dif     = '';
                  $turn = 1;
                  for($i = strlen($str_dif)-1; $i >= 0; $i--){
                    if($turn == 3){
                      $new_dif .= $str_dif[$i].' ';
                      $turn = 1;
                    }else {
                      $new_dif .= $str_dif[$i];
                      $turn++;
                    }
                  }
                  for($i = strlen($new_dif)-1; $i >= 0; $i--){
                    $dif .= $new_dif[$i];
                  }
                  echo $dif;
                  ?> Km² </span>
                  <span class="d-block text-sm">Diferença De Áreas</span>
                </h6>
              </div>
              <div class="col-7 mt-5">
                <div class="table-responsive">
                  <table class="table align-items-center mb-0" style="overflow: hidden">
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-0">
                            <span class="badge me-3" style="background: #0abab5;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Área Nacional</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-xs">1 246 700 Km² </span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-0">
                            <span class="badge me-3" style="background: #FF0080;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Área das Concessões</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-xs"> <?= $area_ocupada; ?> Km² </span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Área Ocupada -->
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-lg-12">
        <h3 class="m-3">Numero de Concessões Explorando Recursos</h3>
      </div>
      <!-- Recursos Explorados -->
      <div class="card">
        <div class="card-body p-3">
            <div class="row">
              <div class="col-4">
                <div class="chart">
                  <canvas id="chart-recursos" class="chart-canvas" height="160"></canvas>
                </div>
              </div>
              <div class="col-8">
                <div class="table-responsive">
                  <table class="table align-items-center mb-0" style="overflow: hidden">
                    <tbody>
                      <?php $a = 0; foreach($params['recursos'] as $key): ?>
                      <?php if($a == 0) echo '<tr>'; ?>
                        <td>
                          <div class="d-flex px-2 py-0">
                            <span class="badge me-3" style="background: <?= $key['cor_mineral']; ?>;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-lg"><?= $key['nome_mineral']; ?></h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm border">
                          <span class="text-lg"> 
                            <?php
                              $recursos = 0;
                              foreach($params['concessoes'] as $sub_key){
                                if (strpos($sub_key['recursos_exploracao'], $key['nome_mineral']) !== false) {
                                  $recursos++;
                                }
                              }
                              echo $recursos;
                            ?>
                          </span>
                        </td>
                        <?php $a++; if($a == 3){echo '</tr>';$a = 0;} ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
      <!-- /Recursos Explorados -->
    </div>
    <div class="row mt-5">
      <div class="col-lg-12">
        <h3 class="m-3">Numero de Concessões Explorando Recursos</h3>
      </div>
      <!-- Título Mineral -->
      <div class="card mt-4" style="min-height: 300px">
        <div class="card-body p-3">
            <div class="row">
              <div class="col-5 text-center">
                <div class="chart">
                  <canvas id="chart-mineral" class="chart-canvas" height="160"></canvas>
                </div>
              </div>
              <div class="col-7 mt-3">
                <div class="table-responsive">
                  <table class="table align-items-center mb-0" style="overflow: hidden;">
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-0">
                            <span class="badge me-3" style="background: #daa520;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-lg">Título de Exploração</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center border">
                          <span class="text-lg"> 
                            <?php
                              $titulo_mineral = 0;
                              foreach($params['concessoes'] as $sub_key){
                                if (strpos($sub_key['titulo_mineral'], 'Título de Exploração') !== false) {
                                  $titulo_mineral++;
                                }
                              }
                              echo $titulo_mineral;
                            ?>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-0">
                            <span class="badge me-3" style="background: #5e2129;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-lg">Título de Prospecção</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center border">
                          <span class="text-lg"> 
                            <?php
                              $titulo_mineral = 0;
                              foreach($params['concessoes'] as $sub_key){
                                if (strpos($sub_key['titulo_mineral'], 'Título de Prospecção') !== false) {
                                  $titulo_mineral++;
                                }
                              }
                              echo $titulo_mineral;
                            ?>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-0">
                            <span class="badge me-3" style="background: #999b9a;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-lg">Alvará Mineral de Exploração</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center border">
                          <span class="text-lg">
                            <?php
                              $titulo_mineral = 0;
                              foreach($params['concessoes'] as $sub_key){
                                if (strpos($sub_key['titulo_mineral'], 'Alvará Mineral de Exploração') !== false) {
                                  $titulo_mineral++;
                                }
                              }
                              echo $titulo_mineral;
                            ?>
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-0">
                            <span class="badge me-3" style="background: #d1ccc7;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-lg">Alvará Mineral de Prospecção</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center border">
                          <span class="text-lg">
                            <?php
                              $titulo_mineral = 0;
                              foreach($params['concessoes'] as $sub_key){
                                if (strpos($sub_key['titulo_mineral'], 'Alvará Mineral de Prospecção') !== false) {
                                  $titulo_mineral++;
                                }
                              }
                              echo $titulo_mineral;
                            ?>
                          </span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
      <!-- /Título Mineral -->
    </div>
  </div>
</main>