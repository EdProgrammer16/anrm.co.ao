<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <?php include_once(DIRREQ.'/app/view/include/navbar.php'); ?>
  <!-- End Navbar -->

  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-lg-6">
        <h3 class="text-uppercase">Painel do  Administrador</h3>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-sm-4 col-6">
        <div class="card">
          <div class="card-body text-center">
            <h1 class="text-gradient text-primary"><span id="status1" countto="<?= count($params['concessoes']); ?>"><?= count($params['concessoes']); ?></span></h1>
            <h6 class="font-weight-bolder">Total de Concessões</h6>
            <a href="<?= DIRPAGE; ?>concessoes" class="btn bg-gradient-primary btn-lg w-100">Monitorar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4 col-6">
        <div class="card">
          <div class="card-body text-center">            
            <h1 class="text-gradient text-primary"> <span id="status2" countto="<?= count($params['usuarios']); ?>"><?= count($params['usuarios']); ?></span></h1>
            <h6 class="font-weight-bolder">Total de Usuários</h6>
            <a href="<?= DIRPAGE; ?>usuarios" class="btn bg-gradient-primary btn-lg w-100">Monitorar</a>
          </div>
        </div>
      </div>
      <!-- <div class="col-md-3 col-sm-6 col-6 mt-4 mt-md-0">
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
            </h1>
            <h6 class="font-weight-bolder">Actividades</h6>
            <a href="<?= DIRPAGE; ?>activities" class="btn bg-gradient-primary btn-lg w-100">Monitorar</a>
          </div>
        </div>
      </div> -->
      <div class="col-sm-4 col-6 mt-4 mt-md-0">
        <div class="card">
          <div class="card-body text-center">
            <h1 class="text-gradient text-primary"><span id="status4" countto="<?= count($params['recursos']); ?>"><?= count($params['recursos']); ?></span></h1>
            <h6 class="font-weight-bolder">Recursos Mineiros Solicitados</h6>
            <a href="<?= DIRPAGE; ?>painel-admin/recursos" class="btn bg-gradient-primary btn-lg w-100">Monitorar</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-lg-7">
        <div class="card z-index-2">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-warning text-center border-radius-xl mt-n4 me-3 float-start">
              <i class="material-icons opacity-10">campaign</i>
            </div>
            <h5 class="mb-0">Concessões em Alerta</h5>
            <p class="mb-0 text-sm">Notificação</p>
          </div>
          <div class="card-body d-flex p-3 pt-0">
            <div class="chart w-50 d-none">
              <canvas id="doughnut-chart" class="chart-canvas" height="300"></canvas>
            </div>
            <div class="table-responsive w-100" style="max-height: 80vh;">
              <table class="table align-items-center mb-0" style="overflow: hidden">
                <tbody>
                  <?php 
                    foreach($params['concessoes'] as $key): 
                      $atual_date = date('Y-m-d');
                      $ano_emissao = date('Y', strtotime($atual_date));
                      $mes_emissao = date('m', strtotime($atual_date));
                      $dia_emissao = date('d', strtotime($atual_date));
                      // ===============================================================
                      $ano_validade = date('Y', strtotime($key['data_validade_mineral']));
                      $mes_validade = date('m', strtotime($key['data_validade_mineral']));
                      $dia_validade = date('d', strtotime($key['data_validade_mineral']));
                      $alerta = '';

                      if($ano_emissao == $ano_validade){
                        if($mes_emissao == $mes_validade){
                          if($dia_emissao >= $dia_validade){
                            $alerta = '<span class="badge badge-primary d-block text-uppercase">Expirado - '.$key['titulo_mineral'].'</span>';
                          }else {
                            $alerta = '<span class="badge badge-warning d-block text-uppercase">'.($dia_validade - $dia_emissao).' DIAS - '.$key['titulo_mineral'].'</span>';
                          }
                        }else if($mes_emissao > $mes_validade){
                          $alerta = '<span class="badge badge-primary d-block text-uppercase">Expirado - '.$key['titulo_mineral'].'</span>';
                        }else if(strpos($key['titulo_mineral'], 'Prospecção') && ($mes_validade - $mes_emissao) <= 3) {
                          $alerta = '<span class="badge badge-warning d-block text-uppercase">'.($mes_validade - $mes_emissao).' MESES - '.$key['titulo_mineral'].'</span>';
                        }else if(strpos($key['titulo_mineral'], 'Exploração') && ($mes_validade - $mes_emissao) <= 6) {
                          $alerta = '<span class="badge badge-warning d-block text-uppercase">'.($mes_validade - $mes_emissao).' MESES - '.$key['titulo_mineral'].'</span>';
                        }
                      }elseif($ano_emissao > $ano_validade) {
                        $alerta = '<span class="badge badge-primary d-block text-uppercase">Expirado - '.$key['titulo_mineral'].'</span>';
                      }elseif($ano_validade - $ano_emissao == 1){
                        if($mes_emissao - $mes_validade >= 6){
                          $alerta = '<span class="badge badge-warning d-block text-uppercase">'.((12 - $mes_emissao) + ($mes_validade)).' MESES - '.$key['titulo_mineral'].'</span>';
                        }
                      }

                      if($alerta != ''):
                  ?>
                    
                  <tr class="coluna" data-search="<?= $key['id'];?>" data-endpoint="concessao">
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm text-uppercase"><?= $key['denominacao']?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center">
                      <?= $alerta; ?>
                    </td>
                  </tr>
                  <?php 
                    endif;
                    endforeach; 
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <div class="row">
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <!-- <div class="d-flex mb-3">
                      <p class="mb-0">ON</p>
                      <div class="form-check form-switch ms-auto">
                        <input class="form-check-input" checked type="checkbox" id="flexSwitchCheckTemperature">
                      </div>
                    </div> -->
                    <p class="mt-2 mb-0 font-weight-bold">Alerta de Prospecção</p>
                    <span class="text-sm">3 Meses</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 mt-md-0 mt-4">
                <div class="card">
                  <div class="card-body">
                    <!-- <div class="d-flex mb-3">
                      <p class="mb-0">ON</p>
                      <div class="form-check form-switch ms-auto">
                        <input class="form-check-input" checked type="checkbox" id="flexSwitchCheckTemperature">
                      </div>
                    </div> -->
                    <p class="mt-2 mb-0 font-weight-bold">Alerta de Exploração</p>
                    <span class="text-sm">6 Meses</span>
                  </div>
                </div>
              </div>  
            </div>
          </div>  
        </div>
      </div>
      <div class="col-lg-5 mt-4 mt-lg-0">
        <!-- Recursos Explorados -->
        <div class="card">
          <div class="card-header pb-0 p-3">
            <div class="d-flex align-items-center">
              <h5 class="mb-0">Recursos Mineiros Solicitados</h5>
            </div>
            <p class="mb-0 text-sm">Território Nacional</p>
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <table class="table align-items-center mb-0" style="overflow: hidden">
                    <tbody>
                      <?php foreach($params['recursos'] as $key): ?>
                      <tr class="coluna" data-search="<?= base64_encode($key['nome_mineral']); ?>" data-endpoint="recursos">
                        <td>
                          <div class="d-flex px-2 py-0">
                            <span class="badge me-3" style="background: <?= $key['cor_mineral']; ?>;"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"><?= $key['nome_mineral']; ?></h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-xs"> 
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
      </div>
    </div>
    <!-- ============================== -->
    <?php include_once(DIRREQ.'/app/view/include/footer.php'); ?>
  </div>
</main>