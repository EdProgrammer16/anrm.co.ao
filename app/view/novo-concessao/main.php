<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y">
  <!-- Navbar -->
  <?php include_once(DIRREQ.'/app/view/include/navbar.php'); ?>
  <!-- End Navbar -->

  <div class="container-fluid">
    <div class="row min-vh-80">
      <div class="col-lg-8 col-md-10 col-12 mx-auto">
        <h3 class="mt-3 mb-7 text-uppercase text-center">Nova Concessão</h3>
        <!-- <p class="lead font-weight-normal opacity-8 mb-7 text-center">This information will let us know more about you.</p> -->
        <div class="card">
          <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <div class="multisteps-form__progress">
                <button class="multisteps-form__progress-btn js-active" type="button" title="Denominação">
                  <span>1. Denominação</span>
                </button>
                <button class="multisteps-form__progress-btn" type="button" title="TIPOLOGIA">2. TIPOLOGIA</button>
                <button class="multisteps-form__progress-btn" type="button" title="Info">3. Info</button>
                <button class="multisteps-form__progress-btn" type="button" title="Bónus">4. Bónus</button> 
                <button class="multisteps-form__progress-btn" type="button" title="Pagamentos">5. Pagamentos</button>
                <button class="multisteps-form__progress-btn" type="button" title="Upload">6. Upload</button>
                <button class="multisteps-form__progress-btn" type="button" title="Upload">7. Upload</button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <form class="multisteps-form__form" id="form_concessao" method="post" enctype="multipart/form-data" action="<?= DIRPAGE; ?>novo/addconcessao">
              <!-- Informações 1 -->
              <div class="multisteps-form__panel text-uppercase border-radius-xl bg-white js-active" data-animation="FadeIn">
                <h5 class="font-weight-bolder mb-3">Denominação</h5>
                <!-- <p class="mb-0 text-sm">Mandatory informations</p> -->
                <div class="multisteps-form__content">
                  <!-- <div class="row mt-4">
                    <div class="col-12 col-sm-6">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">N° Processo</label>
                        <input class="multisteps-form__input form-control" id="n_processo" name="n_processo" type="text" />
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">Data de Entrada Do Processo</label>
                        <input class="form-control datetimepicker" id="data_entrada_processo" name="data_entrada_processo" type="text" data-input>
                      </div>
                    </div>
                  </div> -->
                  <div class="row mt-4">
                    <div class="col-12 col-sm-6">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">Denominação</label>
                        <input class="multisteps-form__input form-control" id="denominacao" name="denominacao" type="text" />
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">Representante Legal</label>
                        <input class="multisteps-form__input form-control" id="representante_legal" name="representante_legal" type="text" />
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-12 col-sm-6">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">NIF Denominação</label>
                        <input class="multisteps-form__input form-control" id="nif_denominacao" name="nif_denominacao" type="text" />
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">Socios</label>
                        <input class="multisteps-form__input form-control" id="socio1" name="socio1" type="text" />
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-12 col-sm-6">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">E-mail</label>
                        <input class="multisteps-form__input form-control" id="email" name="email" type="email" />
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">TELEFONE</label>
                        <input class="multisteps-form__input form-control" id="contacto" name="contacto" type="number" />
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-12 col-md-6">
                      <div>
                        <!-- <label class="form-label mb-0 ms-0">TIPOLOGIA DO TÍTULO MINEIRO</label> -->
                        <select class="form-control" name="provincia" id="provincia">
                          <option value="" selected>Província</option>
                          <?php
                            foreach($params['provincias'] as $key){
                              echo '<option value="'.$key["pro_titulo"].'">'.$key["pro_titulo"].'</option>';
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="row">
                        <div class="col-9 pe-0">
                          <div class="input-group input-group-dynamic">
                            <label class="form-label">Area Ocupada</label>
                            <input type="text" name="area_ocupada" class="form-control w-100" id="area_ocupada" aria-describedby="areaOcupada">
                          </div>
                        </div>
                        <div class="col-3 ps-0" style="padding-top: .095rem;">
                          <select class="form-control" name="area_ocupada_unidade" id="area_ocupada_unidade">
                            <option value="Km²" selected>Km²</option>
                            <option value="Ha">Ha</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!-- /Informações 1 -->
              
              <!-- Informações 2 -->
              <div class="multisteps-form__panel pt-3 border-radius-xl bg-white text-uppercase" data-animation="FadeIn">
                <h5 class="font-weight-bolder mb-3">TIPOLOGIA DO TÍTULO MINEIRO</h5>
                <div class="multisteps-form__content">
                  <div class="row mt-4">
                    <div class="col-12 col-md-6">
                      <div>
                        <!-- <label class="form-label mb-0 ms-0">TIPOLOGIA DO TÍTULO MINEIRO</label> -->
                        <select class="form-control" name="titulo_mineral" id="titulo_mineral" >
                        <option value="" selected>TIPOLOGIA DO TÍTULO MINEIRO</option>
                          <option value="Titulo de Prospecção">Título de Prospecção</option>
                          <option value="Titulo de Exploração">Título de Exploração</option>
                          <option value="Alvará Mineral de Prospecçãoo">Alvará Mineral de Prospecção</option>
                          <option value="Alvará Mineral de Exploração">Alvará Mineral de Exploração</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">N° Do Título</label>
                        <input class="multisteps-form__input form-control" id="n_mineral" name="n_mineral" type="text" />
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label">Data de Emissão Do Título</label>
                          <input class="form-control datetimepicker" id="data_emissao_mineral" name="data_emissao_mineral" type="text" data-input>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label">Data de Caducidade do Titulo</label>
                          <input class="form-control datetimepicker" id="data_validade_mineral" name="data_validade_mineral" type="text" data-input>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-4">
                    <div class="col-12 col-md-6">
                      <div>
                        <!-- <label class="form-label mb-0 ms-0">TIPOLOGIA DO TÍTULO MINEIRO</label> -->
                        <select class="form-control" name="estado_projecto" id="choices-currency_1"  focusable>
                          <option value="1" selected>Situação Operacional</option>
                          <option value="Operante">Operante</option>
                          <option value="Inoperante">Inoperante</option>
                          <option value="Suspeção">Suspenso</option>
                          <option value="Extinto">Extinto</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">N° Código</label>
                        <input class="multisteps-form__input form-control" id="codigo_n" name="codigo_n" type="text" />
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label">Data de Emissão Do Código</label>
                          <input class="form-control datetimepicker" id="data_emissao_codigo" name="data_emissao_codigo" type="text" data-input>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                          <label class="form-label">Data de Caducidade Do Código </label>
                          <input class="form-control datetimepicker" id="data_caducidade_codigo" name="data_caducidade_codigo" type="text" data-input>
                      </div>
                    </div>
                  </div>

                  <div class="row mt-4">
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                      <label class="mt-4 form-label">RECURSOS DE EXPLORAÇÃO</label>
                      <select class="form-control" name="recursos_exploracao" id="recursos_exploracao" multiple="true">
                        <option value="">ESCOLHER RECURSOS</option>
                          <?php
                            foreach($params['recursos'] as $key){
                              echo '<option value="'.$key["nome_mineral"].'">'.$key["nome_mineral"].'</option>';
                            }
                          ?>
                      </select>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0" id="data-evento_div">
                        <div class="input-group input-group-dynamic">
                          <label id="data_evento_label" class="form-label">Data de Envento</label>
                          <input class="form-control datetimepicker" id="data_evento" name="data_evento" type="text" data-input>
                        </div>
                      </div>
                  </div>

                  <div class="button-row d-flex mt-0 mt-md-4">
                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!-- /Informações 2 -->

              <!-- Informações 3 -->
              <div class="multisteps-form__panel pt-3 border-radius-xl bg-white text-uppercase" data-animation="FadeIn">
                <h5 class="font-weight-bolder mb-3">Informações 3</h5>
                <div class="multisteps-form__content">
                  <div class="row mt-4">
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">Data de Inicio das Negociações</label>
                        <input class="form-control datetimepicker" id="data_inicio_negociacoes" name="data_inicio_negociacoes" type="text" data-input>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">DATA DE RUBRICA DO CIM</label>
                        <input class="form-control datetimepicker" id="data_rubrica_contratos" name="data_rubrica_contratos" type="text" data-input>
                      </div>
                    </div>
                  </div>
                  
                  <div class="row mt-4">
                    <div class="col-12 col-md-6 mt-4">
                        <div class="row">
                          <div class="col-9 pe-0">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Caução</label>
                              <input type="text" name="caucao" class="form-control w-100" id="caucao" aria-describedby="caucao">
                            </div>
                          </div>
                          <div class="col-3 ps-0" style="padding-top: .095rem;">
                            <select class="form-control" name="caucao_moeda" id="caucao_moeda">
                              <option value="USD" selected>USD</option>
                              <option value="EUR">EUR</option>
                              <option value="AOA">AOA</option>
                            </select>
                          </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 mt-4">
                        <div class="row">
                          <div class="col-9 pe-0">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Valor do Investimento</label>
                              <input type="text" name="valor_investimento" class="form-control w-100" id="valor_investimento" aria-describedby="valorInvestimento">
                            </div>
                          </div>
                          <div class="col-3 ps-0" style="padding-top: .095rem;">
                            <select class="form-control" name="valor_investimento_moeda" id="valor_investimento_moeda">
                              <option value="USD" selected>USD</option>
                              <option value="EUR">EUR</option>
                              <option value="AOA">AOA</option>
                            </select>
                          </div>
                        </div>
                    </div>
                  </div>

                  <h6 class="font-weight-bolder mt-4">Postos de Trabalho</h6>

                  <div class="row mt-3">
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">Homens Nacionais</label>
                        <input class="multisteps-form__input form-control" id="homens_nacionais" name="homens_nacionais" type="number" />
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">Homens Estrangeiros</label>
                        <input class="multisteps-form__input form-control" id="homens_estrangeiros" name="homens_estrangeiros" type="number">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row mt-4">
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">Mulheres Nacionais</label>
                        <input class="multisteps-form__input form-control" id="mulheres_nacionais" name="mulheres_nacionais" type="number">
                      </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                      <div class="input-group input-group-dynamic">
                        <label class="form-label">Mulhres Estrangeiros</label>
                        <input class="multisteps-form__input form-control" id="mulheres_estrangeiros" name="mulheres_estrangeiros" type="number">
                      </div>
                    </div>
                  </div>
                 
                  <div class="button-row d-flex mt-4">
                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!-- /Informações 3 -->

              <!-- Informações 4 -->
              <div class="multisteps-form__panel border-radius-xl bg-white text-uppercase" data-animation="FadeIn">
                <h5 class="font-weight-bolder mb-3">Bónus de Assinatura Por Prestação</h5>
                <!-- <p class="mb-0 text-sm">Mandatory informations</p> -->
                <div class="multisteps-form__content">
                  <div class="row">
                    <?php for($i=1; $i<=5; $i++): ?>
                      <div class="col-12 col-md-6 mt-4">
                        <div class="row">
                          <div class="col-9 pe-0">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label"><?= $i; ?>ª Prestação</label>
                              <input type="number" name="prestacao_<?= $i; ?>" class="form-control w-100" id="prestacao_<?= $i; ?>" aria-describedby="<?= $i; ?>Prestacao">
                            </div>
                          </div>
                          <div class="col-3 ps-0" style="padding-top: .095rem;">
                            <select class="form-control" name="prestacaoMoeda_<?= $i; ?>" id="choices-currency_<?= $i+1; ?>">
                              <option value="USD" selected>USD</option>
                              <option value="EUR">EUR</option>
                              <option value="AOA">AOA</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    <?php endfor; ?>
                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!-- /Informações 4 -->

              <!-- Informações 5 -->
              <div class="multisteps-form__panel border-radius-xl bg-white text-uppercase" data-animation="FadeIn">
                <h5 class="font-weight-bolder mb-3">Pagamento da Taxa de Superfície</h5>
                <!-- <p class="mb-0 text-sm">Mandatory informations</p> -->
                <div class="multisteps-form__content">
                  <div class="row">
                    <?php for($i=1; $i<=7; $i++): ?>
                      <div class="col-12 col-md-6 mt-4">
                        <div class="row">
                          <div class="col-9 pe-0">
                            <div class="input-group input-group-dynamic">
                              <label class="form-label">Taxa do <?= $i; ?>° Ano</label>
                              <input type="number" name="pagamento_taxa_superfice_<?= $i; ?>" class="form-control w-100" id="pagamento_taxa_superfice_<?= $i; ?>" aria-describedby="pagamentoTaxaSuperfice<?= $i; ?>">
                            </div>
                          </div>
                          <div class="col-3 ps-0" style="padding-top: .095rem;">
                            <select class="form-control" name="pagamentoUnidade_<?= $i; ?>" id="choices-currency_<?= $i+6; ?>">
                              <option value="USD" selected>USD</option>
                              <option value="EUR">EUR</option>
                              <option value="AOA">AOA</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    <?php endfor; ?>
                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!-- /Informações 5 -->
              
              <!-- Informações 6 -->
              <div class="multisteps-form__panel pt-3 border-radius-xl bg-white text-uppercase" data-animation="FadeIn">
                <h5 class="font-weight-bolder mb-3">Uploads de Arquivos</h5>
                <div class="multisteps-form__content mt-3">
                  <div class="row mt-4">
                    <div class="col-12 col-md-6">
                      <h6 class="font-weight-bolder mt-3 text-center">DOCUMENTOS LEGAIS DA EMPRESA</h6>
                      <div class="row">
                        <div class="col-12">
                          <label for="documento_legal" class="btn  w-100 bg-gradient-primary mb-0">Carregar Arquivo</label>
                          <input type="file" name="documento_legal" id="documento_legal" hidden />
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <h6 class="font-weight-bolder mt-3 text-center">REQUERIMENTO DIRIGIDO AO MINISTRO</h6>
                      <div class="row">
                        <div class="col-12">
                          <label for="carta_ministro" class="btn  w-100 bg-gradient-primary mb-0">Carregar Arquivo</label>
                          <input type="file" name="carta_ministro" id="carta_ministro" hidden />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-12">
                      <h6 class="font-weight-bolder mt-3 text-center">CROQUIS DE LOCALIZAÇÃO</h6>
                      <div class="row">
                        <div class="col-12">
                          <label for="croquis_localizacao" class="btn  w-100 bg-gradient-primary mb-0">Carregar Arquivo</label>
                          <input type="file" name="croquis_localizacao" id="croquis_localizacao" hidden />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!-- /Informações 6 -->

              <!-- Informações 7 -->
              <div class="multisteps-form__panel pt-3 border-radius-xl bg-white text-uppercase" data-animation="FadeIn">
                <h5 class="font-weight-bolder mb-3">Uploads de Arquivos</h5>
                <div class="multisteps-form__content mt-3">
                  <div class="row mt-5">
                    <div class="col-12 col-md-6">
                      <h6 class="font-weight-bolder mt-3">PROVAS DE CAPACIDADE TÉCNICA E FINANCEIRA DA EMPRESA</h6>
                      <div class="row">
                        <div class="col-12">
                          <label for="declaracao_capacidade_empresa" class="btn  w-100 bg-gradient-primary mb-0">Carregar Arquivo</label>
                          <input type="file" name="declaracao_capacidade_empresa" id="declaracao_capacidade_empresa" hidden />
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <h6 class="font-weight-bolder mt-3">Relatório de Contas e do Exercício Económico</h6>
                      <div class="row">
                        <div class="col-12">
                          <label for="relatorio_contas_economico" class="btn  w-100 bg-gradient-primary mb-0">Carregar Arquivo</label>
                          <input type="file" name="relatorio_contas_economico" id="relatorio_contas_economico" hidden />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <div class="col-12">
                      <h6 class="font-weight-bolder mt-3">Programa de Trabalho e Proposta de Investimentos</h6>
                      <div class="row">
                        <div class="col-12">
                          <label for="programa_trabalho_investimentos" class="btn  w-100 bg-gradient-primary mb-0">Carregar Arquivo</label>
                          <input type="file" name="programa_trabalho_investimentos" id="programa_trabalho_investimentos" hidden />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="button-row d-flex mt-0 mt-md-4">
                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn bg-gradient-dark ms-auto mb-0" type="submit" id="btn_send" title="Submit">Send</button>
                  </div>
                </div>
              </div>
              <!-- /Informações 7 -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="position-fixed bottom-1 end-1 z-index-2">
    <div class="toast fade hide p-2 bg-white" role="alert" aria-live="assertive" id="successToast" aria-atomic="true">
      <div class="toast-header border-0">
        <i class="material-icons text-success me-2">
        check
        </i>
        <span class="me-auto font-weight-bold">Notificação </span>
        <small class="text-body">Agora</small>
        <i class="fas fa-times text-md ms-3 cursor-pointer close" data-bs-dismiss="toast" aria-label="Close"></i>
      </div>
      <hr class="horizontal dark m-0">
      <div class="toast-body">
        Concessão Criada com sucesso!
      </div>
    </div>
    <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="dangerToast" aria-atomic="true">
    <div class="toast-header border-0">
    <i class="material-icons text-danger me-2">
    campaign
    </i>
    <span class="me-auto text-gradient text-danger font-weight-bold">Alerta </span>
    <small class="text-body">Agora</small>
    <i class="fas fa-times text-md ms-3 cursor-pointer close" data-bs-dismiss="toast" aria-label="Close"></i>
    </div>
    <hr class="horizontal dark m-0">
    <div class="toast-body">
    Concessão não foi criada!
    </div>
    </div>
  </div>
  
  <?php include_once(DIRREQ.'/app/view/include/footer.php'); ?>
</div>
</main>