<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y">
  <!-- Navbar -->
  <?php include_once(DIRREQ.'/app/view/include/navbar.php'); ?>
  <!-- End Navbar -->

  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-lg-6">
        <a href="<?= DIRPAGE; ?>concessoes" class="text-dark mb-md-0" type="button" style="border-radius: 100%" name="button">
          <h3 class="text-uppercase">
            <i class="fa fa-arrow-left"></i>
            <?= $params['concessao'][0]['denominacao']; ?>
          </h3>
        </a>
      </div>
      <div class="col-lg-6 text-right d-flex align-items-end">
        <?php if($params['usuario'][0]['usuario_perm'] == 'superadmin' || $params['usuario'][0]['usuario_perm'] == 'admin' || $params['usuario'][0]['usuario_perm'] == 'moder'): ?>
          <a href="<?= DIRPAGE; ?>gerar/PDF/concessao/<?= $params['concessao'][0]['id']; ?>" class="btn btn-outline-primary me-3 ms-auto">Baixar Conteúdo</a>
          <a href="<?= DIRPAGE; ?>concessoes/edit/<?= $params['concessao'][0]['id']; ?>" class="btn bg-gradient-primary">Editar</a>
        <?php endif; ?>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-lg-4 col-sm-6">
        <div class="card h-100 mb-4">
          <div class="card-header pb-0 px-3">
            <div class="row">
              <div class="col">
                <h5 class="mb-0 text-uppercase">Arquivos para Download</h5>
              </div>
              <div class="col-auto d-flex justify-content-start justify-content-md-end align-items-center">
                <i class="material-icons me-2 text-lg">date_range</i>
              </div>
            </div>
          </div>
          <div class="card-body pt-4 p-3">
            <?php foreach($params['concessao'] as $key): ?>
            <ul class="list-group">
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center col-8">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">DOCUMENTOS LEGAIS DA EMPRESA</h6>
                    <?php if($key['documento_legal'] != ''): ?>
                      <span class="text-xs d-inline-block"><?= $key['documento_legal']; ?></span>
                    <?php else: ?>
                      <span class="text-xs">Sem Arquivo</span>
                    <?php endif; ?>
                  </div>
                </div>
                  <?php if($key['documento_legal'] != ''): ?>
                    <a href="<?= DIRPAGE; ?>public/arquivos/denominacao-<?= $key['id']; ?>/documento_legal/<?= $key['documento_legal']; ?>" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center" download="<?= $key['documento_legal']; ?>">
                      <i class="material-icons text-lg">download</i>
                    </a>
                  <?php else: ?>
                    <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center disabled">
                      <i class="material-icons text-lg">priority_high</i>
                    </button>
                  <?php endif; ?>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center col-8">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">REQUERIMENTO DIRIGIDO AO MINISTRO</h6>
                    <?php if($key['carta_ministro'] != ''): ?>
                      <span class="text-xs"><?= $key['carta_ministro']; ?></span>
                    <?php else: ?>
                      <span class="text-xs">Sem Arquivo</span>
                    <?php endif; ?>
                  </div>
                </div>
                  <?php if($key['carta_ministro'] != ''): ?>
                    <a href="<?= DIRPAGE; ?>public/arquivos/denominacao-<?= $key['id']; ?>/carta_ministro/<?= $key['carta_ministro']; ?>" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center" download="<?= $key['carta_ministro']; ?>">
                      <i class="material-icons text-lg">download</i>
                    </a>
                  <?php else: ?>
                    <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center disabled">
                      <i class="material-icons text-lg">priority_high</i>
                    </button>
                  <?php endif; ?>
              </li>
              <li class="d-none list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center col-8">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">CARTA CONFORTO, REMETIDO Á ANRM</h6>
                    <?php if($key['carta_conforto_anrm'] != ''): ?>
                      <span class="text-xs"><?= $key['carta_conforto_anrm']; ?></span>
                    <?php else: ?>
                      <span class="text-xs">Sem Arquivo</span>
                    <?php endif; ?>
                  </div>
                </div>
                  <?php if($key['carta_conforto_anrm'] != ''): ?>
                    <a href="<?= DIRPAGE; ?>public/arquivos/denominacao-<?= $key['id']; ?>/carta_conforto_anrm/<?= $key['carta_conforto_anrm']; ?>" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center" download="<?= $key['carta_conforto_anrm']; ?>">
                      <i class="material-icons text-lg">download</i>
                    </a>
                  <?php else: ?>
                    <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center disabled">
                      <i class="material-icons text-lg">priority_high</i>
                    </button>
                  <?php endif; ?>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center col-8">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">CROQUIS DE LOCALIZAÇÃO</h6>
                    <?php if($key['croquis_localizacao'] != ''): ?>
                      <span class="text-xs"><?= $key['croquis_localizacao']; ?></span>
                    <?php else: ?>
                      <span class="text-xs">Sem Arquivo</span>
                    <?php endif; ?>
                  </div>
                </div>
                  <?php if($key['croquis_localizacao'] != ''): ?>
                    <a href="<?= DIRPAGE; ?>public/arquivos/denominacao-<?= $key['id']; ?>/croquis_localizacao/<?= $key['croquis_localizacao']; ?>" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center" download="<?= $key['croquis_localizacao']; ?>">
                      <i class="material-icons text-lg">download</i>
                    </a>
                  <?php else: ?>
                    <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center disabled">
                      <i class="material-icons text-lg">priority_high</i>
                    </button>
                  <?php endif; ?>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center col-8">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">PROVAS DE CAPACIDADE TÉCNICA E FINANCEIRA DA EMPRESA</h6>
                    <?php if($key['declaracao_capacidade_empresa'] != ''): ?>
                      <span class="text-xs"><?= $key['declaracao_capacidade_empresa']; ?></span>
                    <?php else: ?>
                      <span class="text-xs">Sem Arquivo</span>
                    <?php endif; ?>
                  </div>
                </div>
                  <?php if($key['declaracao_capacidade_empresa'] != ''): ?>
                    <a href="<?= DIRPAGE; ?>public/arquivos/denominacao-<?= $key['id']; ?>/declaracao_capacidade_empresa/<?= $key['declaracao_capacidade_empresa']; ?>" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center" download="<?= $key['declaracao_capacidade_empresa']; ?>">
                      <i class="material-icons text-lg">download</i>
                    </a>
                  <?php else: ?>
                    <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center disabled">
                      <i class="material-icons text-lg">priority_high</i>
                    </button>
                  <?php endif; ?>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center col-8">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">RELATÓRIO DE CONTAS E DO EXERCÍCIO ECONÓMICO</h6>
                    <?php if($key['relatorio_contas_economico'] != ''): ?>
                      <span class="text-xs"><?= $key['relatorio_contas_economico']; ?></span>
                    <?php else: ?>
                      <span class="text-xs">Sem Arquivo</span>
                    <?php endif; ?>
                  </div>
                </div>
                  <?php if($key['relatorio_contas_economico'] != ''): ?>
                    <a href="<?= DIRPAGE; ?>public/arquivos/denominacao-<?= $key['id']; ?>/relatorio_contas_economico/<?= $key['relatorio_contas_economico']; ?>" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center" download="<?= $key['relatorio_contas_economico']; ?>">
                      <i class="material-icons text-lg">download</i>
                    </a>
                  <?php else: ?>
                    <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center disabled">
                      <i class="material-icons text-lg">priority_high</i>
                    </button>
                  <?php endif; ?>
              </li>
              <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                <div class="d-flex align-items-center col-8">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">PROGRAMA DE TRABALHO E PROPOSTA DE INVESTIMENTOS</h6>
                    <?php if($key['programa_trabalho_investimentos'] != ''): ?>
                      <span class="text-xs"><?= $key['programa_trabalho_investimentos']; ?></span>
                    <?php else: ?>
                      <span class="text-xs">Sem Arquivo</span>
                    <?php endif; ?>
                  </div>
                </div>
                  <?php if($key['programa_trabalho_investimentos'] != ''): ?>
                    <a href="<?= DIRPAGE; ?>public/arquivos/denominacao-<?= $key['id']; ?>/programa_trabalho_investimentos/<?= $key['programa_trabalho_investimentos']; ?>" class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center" download="<?= $key['programa_trabalho_investimentos']; ?>">
                      <i class="material-icons text-lg">download</i>
                    </a>
                  <?php else: ?>
                    <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 ms-auto p-3 btn-sm d-flex align-items-center justify-content-center disabled">
                      <i class="material-icons text-lg">priority_high</i>
                    </button>
                  <?php endif; ?>
              </li>
            </ul>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="col-lg-8 col-sm-6 mt-sm-0 mt-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-warning text-center border-radius-xl mt-n4 me-3 float-start">
              <i class="material-icons opacity-10">pie_chart</i>
            </div>
            <h4 class="font-weight-bolder">DENOMINAÇÃO</h4>
          </div>
          <div class="card-body">
            <?php foreach($params['concessao'] as $key): ?>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">N° de Processo</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['n_processo'] != '')
                      {
                        echo $key['n_processo']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Data De Entrada Do Processso</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['data_entrada_processo'] != '')
                      {
                        echo formatar_data($key['data_entrada_processo']); 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Denominação</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['denominacao'] != '')
                      {
                        echo $key['denominacao']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Representante Legal</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?= $key['representante_legal']; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">NIF Denominação</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['nif_denominacao'] != '')
                      {
                        echo $key['nif_denominacao'];
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Socios</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['socio2'] != '')
                      {
                        echo $key['socio2'];
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">E-mail</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['email'] != '')
                      {
                        echo $key['email'];
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Telefone</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['contacto'] != '')
                      {
                        echo $key['contacto'];
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Provincia</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['provincia'] != '')
                      {
                        echo $key['provincia'];
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Área Ocupada</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['area_ocupada'] != '')
                      {
                        echo $key['area_ocupada'];
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-sm-5">
        <div class="card">
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
                      <tr class="coluna">
                        <td>
                          <div class="d-flex px-2 py-0">
                            <div class="d-flex flex-column justify-content-center">
                              <h4 class="mb-0 text-lg">Nacionais</h4>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-lg"> 
                            <?= $params['concessao'][0]['homens_nacionais'     ]+
                                $params['concessao'][0]['mulheres_nacionais'   ];
                            ?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr class="coluna">
                        <td>
                          <div class="d-flex ps-4 pe-2 py-0">
                            <span class="badge me-3" style="background: #328bed"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Homens</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-xs"> 
                            <?= $params['concessao'][0]['homens_nacionais'];?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr class="coluna">
                        <td>
                          <div class="d-flex ps-4 pe-2 py-0">
                            <span class="badge me-3" style="background: #e22e6d"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Mulheres</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-xs"> 
                            <?= $params['concessao'][0]['mulheres_nacionais'];?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr class="coluna pt-5">
                        <td>
                          <div class="d-flex px-2 py-0">
                            <div class="d-flex flex-column justify-content-center">
                              <h5 class="mb-0 text-lg">Expatriados</h5>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-lg"> 
                            <?= $params['concessao'][0]['homens_estrangeiros'  ]+
                                $params['concessao'][0]['mulheres_estrangeiros'];
                            ?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr class="coluna">
                        <td>
                          <div class="d-flex ps-4 pe-2 py-0">
                            <span class="badge me-3" style="background: #5f6776"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Homens</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-xs"> 
                            <?= $params['concessao'][0]['homens_estrangeiros'];?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr class="coluna">
                        <td>
                          <div class="d-flex ps-4 pe-2 py-0">
                            <span class="badge me-3" style="background: #fd9a13"> </span>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">Mulheres</h6>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-xs"> 
                            <?= $params['concessao'][0]['mulheres_estrangeiros'];?>
                          </span>
                        </td>
                      </tr>
                      <!-- ================== -->
                      <tr class="coluna pt-5">
                        <td>
                          <div class="d-flex px-2 py-0">
                            <div class="d-flex flex-column justify-content-center">
                              <h4 class="mb-0 text-lg">TOTAL</h4>
                            </div>
                          </div>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="text-lg"> 
                            <?= $params['concessao'][0]['homens_nacionais'     ]+
                                $params['concessao'][0]['mulheres_nacionais'   ]+
                                $params['concessao'][0]['homens_estrangeiros'  ]+
                                $params['concessao'][0]['mulheres_estrangeiros'];
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
      </div>
      <div class="col-sm-7 mt-sm-0 mt-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-warning text-center border-radius-xl mt-n4 me-3 float-start">
              <i class="material-icons opacity-10">pie_chart</i>
            </div>
            <h4 class="font-weight-bolder">TIPOLOGIA DO TÍTULO MINEIRO</h4>
          </div>
          <div class="card-body">
            <?php foreach($params['concessao'] as $key): ?>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">TIPOLOGIA DO TÍTULO MINEIRO</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['titulo_mineral'] != '')
                      {
                        echo $key['titulo_mineral']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">N° Do Título</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['n_mineral'] != '')
                      {
                        echo $key['n_mineral']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Data de Emissão Do Título</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['data_emissao_mineral'] != '')
                      {
                        echo formatar_data($key['data_emissao_mineral']);
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Data de CADUCIDADE Do Título</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['data_validade_mineral'] != '')
                      {
                        echo formatar_data($key['data_validade_mineral']);
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Situação Operacional</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['estado_projecto'] != '')
                      {
                        echo $key['estado_projecto'];
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Código N°</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['codigo_n'] != '')
                      {
                        echo $key['codigo_n']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Data de Emissão Do Código</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['data_emissao_codigo'] != '')
                      {
                        echo formatar_data($key['data_emissao_codigo']);
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Recurosos de Exploração</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['recursos_exploracao'] != '')
                      {
                        echo $key['recursos_exploracao'];
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <?php if(strpos($key['titulo_mineral'], 'Título' ) !== false): ?>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Data de Inicio Das Negociações</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['data_inicio_negociacoes'] != '')
                      {
                        echo formatar_data($key['data_inicio_negociacoes']);
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Data de Rubrica Do CIM</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['data_rubrica_contratos'] != '')
                      {
                        echo formatar_data($key['data_rubrica_contratos']);
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Caução</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['caucao'] != '')
                      {
                        echo $key['caucao'];
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">Valor Do Investimento</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="emailHelp" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['valor_investimento'] != '')
                      {
                        echo $key['valor_investimento']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-warning text-center border-radius-xl mt-n4 me-3 float-start">
              <i class="material-icons opacity-10">pie_chart</i>
            </div>
            <h4 class="font-weight-bolder text-uppercase">Bônus de Assinatura Por Prestação</h4>
          </div>
          <div class="card-body">
            <?php foreach($params['concessao'] as $key): ?>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">1ª Prestação</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="prestacao1" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['prestacao_1'] != '')
                      {
                        echo $key['prestacao_1']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">2ª Prestação</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="prestacao1" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['prestacao_2'] != '')
                      {
                        echo $key['prestacao_2']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">3ª Prestação</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="prestacao3" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['prestacao_3'] != '')
                      {
                        echo $key['prestacao_3']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">4ª Prestação</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="prestacao4" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['prestacao_4'] != '')
                      {
                        echo $key['prestacao_4']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">5ª Prestação</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="prestacao5" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['prestacao_5'] != '')
                      {
                        echo $key['prestacao_5']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="col-sm-6 mt-sm-0 mt-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-warning text-center border-radius-xl mt-n4 me-3 float-start">
              <i class="material-icons opacity-10">pie_chart</i>
            </div>
            <h4 class="font-weight-bolder text-uppercase">Pagamento da Taxa de Superfície</h4>
          </div>
          <div class="card-body">
            <?php foreach($params['concessao'] as $key): ?>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">1° Ano</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="pagamentoTaxaSuperfice1" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['pagamento_taxa_superfice_1'] != '')
                      {
                        echo $key['pagamento_taxa_superfice_1']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">2° Ano</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="pagamentoTaxaSuperfice2" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['pagamento_taxa_superfice_2'] != '')
                      {
                        echo $key['pagamento_taxa_superfice_2']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">4° Ano</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="pagamentoTaxaSuperfice4" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['pagamento_taxa_superfice_4'] != '')
                      {
                        echo $key['pagamento_taxa_superfice_4']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">2° Ano</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="pagamentoTaxaSuperfice2" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['pagamento_taxa_superfice_2'] != '')
                      {
                        echo $key['pagamento_taxa_superfice_2']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12 col-sm-6">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">5° Ano</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="pagamentoTaxaSuperfice5" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['pagamento_taxa_superfice_5'] != '')
                      {
                        echo $key['pagamento_taxa_superfice_5']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">6° Ano</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="pagamentoTaxaSuperfice6" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['pagamento_taxa_superfice_6'] != '')
                      {
                        echo $key['pagamento_taxa_superfice_6']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                <div class="input-group input-group-static">
                  <label class="text-sm fw-bold text-uppercase">7° Ano</label>
                  <div class="form-control w-100 text-lg fw-bold" aria-describedby="pagamentoTaxaSuperfice7" onfocus="focused(this)" onfocusout="defocused(this)">
                    <?php 
                      if($key['pagamento_taxa_superfice_7'] != '')
                      {
                        echo $key['pagamento_taxa_superfice_7']; 
                      }else {
                        echo 'Indisponivel';
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once(DIRREQ.'/app/view/include/footer.php'); ?>
</div>
</main>