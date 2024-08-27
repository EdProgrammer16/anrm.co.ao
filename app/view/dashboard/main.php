<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <?php include_once(DIRREQ.'/app/view/include/navbar.php'); ?>
  <!-- End Navbar -->

  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-lg-6">
        <h3 class="text-uppercase">Dashboard</h3>
      </div>
      <div class="col-lg-6 text-right d-flex align-items-end">
        <!-- <a href="<?= DIRPAGE; ?>gerar/relatorio/geral" class="btn btn-outline-primary me-3 ms-auto">Baixar Relatório</a> -->
        <a href="<?= DIRPAGE; ?>gerar/relatorio/geral" class="btn btn-outline-primary me-3 ms-auto">Baixar Relatório</a>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-md-3 col-sm-6 col-6">
        <div class="card">
          <div class="card-body text-center">
            <h1 class="text-gradient text-primary"><span id="status1" countto="<?= count($params['concessoes']); ?>"><?= count($params['concessoes']); ?></span></h1>
            <h6 class="mb-0 font-weight-bolder">Total de Concessões</h6>
            <p class="opacity-8 text-dark mb-0 text-lg font-weight-bolder">Território Nacional</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6">
        <div class="card">
          <div class="card-body text-center">
            <?php
              $num_postos = 0;
              $hn = 0;
              $he = 0;
              $mn = 0;
              $me = 0;
              foreach($params['concessoes'] as $key){
                $num_postos += $key['homens_nacionais'     ];
                $num_postos += $key['homens_estrangeiros'  ];
                $num_postos += $key['mulheres_nacionais'   ];
                $num_postos += $key['mulheres_estrangeiros'];
                $hn += $key['homens_nacionais'     ];
                $he += $key['homens_estrangeiros'  ];
                $mn += $key['mulheres_nacionais'   ];
                $me += $key['mulheres_estrangeiros'];
              }
            ?>
            <h1 class="text-gradient text-primary"> <span id="status2" countto="<?= $num_postos; ?>"><?= $num_postos; ?></span></h1>
            <h6 class="mb-0 font-weight-bolder">Postos de Trabalho</h6>
            <p class="opacity-8 text-dark mb-0 text-lg font-weight-bolder">Todas as Concessões</p>
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
            <h6 class="mb-0 font-weight-bolder">Área Total  Ocupada</h6>
            <p class="opacity-8 text-dark mb-0 text-lg font-weight-bolder">Todas as Concessões</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-6 mt-4 mt-md-0">
        <div class="card">
          <div class="card-body text-center">
            <h1 class="text-gradient text-primary"><span id="status4" countto="<?= count($params['recursos']); ?>"><?= count($params['recursos']); ?></span></h1>
            <h6 class="mb-0 font-weight-bolder">Recursos Mineiro Solicitados</h6>
            <p class="opacity-8 text-dark mb-0 text-lg font-weight-bolder">Território Nacional</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-lg-5">
        <!-- Provincias -->
        <div class="card z-index-2">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 me-3 float-start">
              <i class="material-icons opacity-10">donut_small</i>
            </div>
            <h5 class="mb-0">Concessões / Provincia</h5>
            <h5 class="mb-0 text-sm">Número de Concessões por Provincia</h5>
          </div>
          <div class="card-body p-3 pt-0">
            <div class="table-responsive w-100">
              <table class="table align-items-center mb-0" style="overflow: hidden">
                <tbody>
                  <?php foreach($params['provincias'] as $key): ?>
                  <tr class="coluna" data-search="<?= base64_encode($key['pro_titulo']);?>" data-endpoint="provincia">
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm text-uppercase"><?= $key['pro_titulo']?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <?php 
                        $total_concessoes = 0;
                        foreach($params['concessoes'] as $sub_key){
                            if($key['pro_titulo'] == $sub_key['provincia']){
                              $total_concessoes++; 
                            }
                        }
                      ?>
                      <span class="font-weight-bold text-sm"> <?= $total_concessoes; ?> </span>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <div class="w-75 mx-auto border-top mt-3 d-none"></div>
            <div class="chart w-50 mx-auto d-none">
              <canvas id="doughnut-provincias" class="chart-canvas" height="300"></canvas>
            </div>
          </div>
        </div>
        <!-- /Provincias -->

        <!-- Postos de Trabalho -->
        <div class="card mt-4">
          <div class="card-header pb-0 p-3">
            <div class="d-flex align-items-center">
              <h4 class="mb-0 text-uppercase">Postos de Trabalho</h4>
            </div>
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-5 text-center">
                <div class="chart">
                  <canvas id="chart-trabalho" class="chart-canvas" height="197"></canvas>
                </div>
              </div>
              <div class="col-7">
                <div class="table-responsive">
                  <table class="table align-items-center mb-0" style="overflow: hidden">
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-0">
                            <div class="d-flex flex-column justify-content-center">
                              <h4 class="mb-0 text-lg">Nacionais</h4>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-lg fw-bolder text-dark"> 
                            <?= $hn+
                                $mn;
                            ?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr>
                        <td>
                          <div class="d-flex ps-5 pe-2 py-0">
                            <span class="badge me-3" style="background: #328bed"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Homens</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-ms text-dark"> 
                            <?= $hn;?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr>
                        <td>
                          <div class="d-flex ps-5 pe-2 py-0">
                            <span class="badge me-3" style="background: #e22e6d"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Mulheres</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-ms text-dark"> 
                            <?= $mn;?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr class="pt-5">
                        <td>
                          <div class="d-flex px-2 py-0">
                            <div class="d-flex flex-column justify-content-center">
                              <h5 class="mb-0 text-lg">Expatriados</h5>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-lg fw-bolder text-dark"> 
                            <?= $he+
                                $me;
                            ?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr>
                        <td>
                          <div class="d-flex ps-5 pe-2 py-0">
                            <span class="badge me-3" style="background: #5f6776"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Homens</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-ms text-dark"> 
                            <?= $he;?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr>
                        <td>
                          <div class="d-flex ps-5 pe-2 py-0">
                            <span class="badge me-3" style="background: #fd9a13"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Mulheres</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-ms text-dark"> 
                            <?= $me;?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr class="pt-5">
                        <td>
                          <div class="d-flex px-2 py-0">
                            <div class="d-flex flex-column justify-content-center">
                              <h4 class="mb-0 text-lg">TOTAL</h4>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-lg fw-bolder text-dark"> 
                            <?= $hn+
                                $mn+
                                $he+
                                $me;
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
        <!-- /Postos de Trabalho -->
      </div>
      <div class="col-lg-7 mt-4 mt-lg-0">
        <!-- Recursos Explorados -->
        <div class="card">
          <div class="card-header pb-0 p-3">
            <div class="d-flex align-items-center">
              <h5 class="mb-0">Concessões / Recurso Mineiro</h5>
            </div>
            <h5 class="mb-0 text-sm">Número de Concessões por Recurso Mineiro</h5>
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-5 text-center">
                <div class="chart">
                  <canvas id="chart-recursos" class="chart-canvas" height="197"></canvas>
                </div>
                <!-- <h4 class="font-weight-bold mt-n8">
                  <span>471.3</span>
                  <span class="d-block text-body text-sm">WATTS</span>
                </h4> -->
              </div>
              <div class="col-7">
                <div class="table-responsive">
                  <table class="table align-items-center mb-0" style="overflow: hidden">
                    <tbody>
                      <?php foreach($params['recursos'] as $key): ?>
                      <tr class="coluna" data-search="<?= base64_encode($key['nome_mineral']); ?>" data-endpoint="recurso">
                        <td>
                          <div class="d-flex px-2 py-0">
                            <span class="badge me-3" style="background: <?= $key['cor_mineral']; ?>;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"><?= $key['nome_mineral']; ?></h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-ms text-dark"> 
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
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Recursos Explorados -->

        <!-- Título Mineral -->
        <div class="card mt-4" style="min-height: 300px">
          <div class="card-header pb-0 p-3">
            <div class="d-flex align-items-center">
              <h5 class="mb-0">Concessões / Tipologia do Título Mineiro</h5>
            </div>
            <p class="mb-0 text-sm">Número de Concessões por Tipologia do Título Mineiro</p>
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-5 text-center">
                <div class="chart">
                  <canvas id="chart-mineral" class="chart-canvas" height="197"></canvas>
                </div>
              </div>
              <div class="col-7 mt-3">
                <div class="table-responsive">
                  <table class="table align-items-center mb-0" style="overflow: hidden">
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-0">
                            <div class="d-flex flex-column justify-content-center">
                              <h4 class="mb-0 text-lg">Exploração</h4>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-lg fw-bolder text-dark"> 
                            <?php
                              $titulo_mineral = 0;
                              $exploracao = 0;
                              foreach($params['concessoes'] as $sub_key){
                                if (strpos($sub_key['titulo_mineral'], 'Exploração') !== false) {
                                  $titulo_mineral++;
                                  $exploracao++;
                                }
                              }
                              echo ($exploracao);
                            ?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr class="coluna" data-search="<?= base64_encode('Título de Exploração'); ?>" data-endpoint="titulo">
                        <td>
                          <div class="d-flex ps-5 pe-2 py-0">
                            <span class="badge me-3" style="background: #daa520;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Titulo de Exploração</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-ms text-dark"> 
                            <?php
                              $titulo_exploracao = 0;
                              foreach($params['concessoes'] as $sub_key){
                                if (strpos($sub_key['titulo_mineral'], 'Título de Exploração') !== false) {
                                  $titulo_exploracao++;
                                }
                              }
                              echo ($titulo_exploracao);
                            ?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr class="coluna" data-search="<?= base64_encode('Alvará Mineral de Exploração'); ?>" data-endpoint="titulo">
                        <td>
                          <div class="d-flex ps-5 pe-2 py-0">
                            <span class="badge me-3" style="background: #999b9a;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Alvará de Exploração</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-ms text-dark"> 
                            <?php
                              $alvara_exploracao = 0;
                              foreach($params['concessoes'] as $sub_key){
                                if (strpos($sub_key['titulo_mineral'], 'Alvará de Exploração') !== false) {
                                  $alvara_exploracao++;
                                }
                              }
                              echo ($alvara_exploracao);
                            ?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr class="pt-5">
                        <td>
                          <div class="d-flex px-2 py-0">
                            <div class="d-flex flex-column justify-content-center">
                              <h5 class="mb-0 text-lg">Prospecção</h5>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-lg fw-bolder text-dark"> 
                          <?php
                              $prospeccao = 0;
                              foreach($params['concessoes'] as $sub_key){
                                if (strpos($sub_key['titulo_mineral'], 'Prospecção') !== false) {
                                  $titulo_mineral++;
                                  $prospeccao++;
                                }
                              }
                              echo ($prospeccao);
                            ?>
                          </span>
                        </td>
                      </tr>
                       <!-- ================== -->
                       <tr class="coluna" data-search="<?= base64_encode('Título de Prospecção'); ?>" data-endpoint="titulo">
                        <td>
                          <div class="d-flex ps-5 pe-2 py-0">
                            <span class="badge me-3" style="background: #5e2129;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Titulo de Prospecção</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-ms text-dark"> 
                            <?php
                              $titulo_prospeccao = 0;
                              foreach($params['concessoes'] as $sub_key){
                                if (strpos($sub_key['titulo_mineral'], 'Título de Prospecção') !== false) {
                                  $titulo_prospeccao++;
                                }
                              }
                              echo ($titulo_prospeccao);
                            ?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr class="coluna" data-search="<?= base64_encode('Alvará Mineral de Prospecção'); ?>" data-endpoint="titulo">
                        <td>
                          <div class="d-flex ps-5 pe-2 py-0">
                            <span class="badge me-3" style="background: #d1ccc7;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Alvará de Prospecção</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-ms text-dark"> 
                            <?php
                              $alvara_prospeccao = 0;
                              foreach($params['concessoes'] as $sub_key){
                                if (strpos($sub_key['titulo_mineral'], 'Alvará de Prospecção') !== false) {
                                  $alvara_prospeccao++;
                                }
                              }
                              echo ($alvara_prospeccao);
                            ?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr class="pt-5">
                        <td>
                          <div class="d-flex px-2 py-0">
                            <div class="d-flex flex-column justify-content-center">
                              <h4 class="mb-0 text-lg">TOTAL</h4>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-lg fw-bolder text-dark"> 
                            <?= $titulo_mineral; ?>
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

        <!-- Área Ocupada -->
        <div class="card mt-4" style="min-height: 300px">
          <div class="card-header pb-0 p-3">
            <div class="d-flex align-items-center">
              <h5 class="mb-0">Área Total  Ocupada</h5>
            </div>
            <p class="mb-0 text-sm">Todas as Concessões</p>
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-5 text-center">
                <div class="chart">
                  <canvas id="chart-area" class="chart-canvas" height="197"></canvas>
                </div>
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
                              <h6 class="mb-0 text-sm">Área Total do Território Nacional</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-ms text-dark fw-bolder">1 246 700 Km² </span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-0">
                            <span class="badge me-3" style="background: #FF0080;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Área Total das Concessões</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-ms text-dark fw-bolder"> <?= $area_ocupada; ?> Km² </span>
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
    <!-- ============================== -->
    <?php include_once(DIRREQ.'/app/view/include/footer.php'); ?>
  </div>
</main>