<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <?php include_once(DIRREQ.'/app/view/include/navbar.php'); ?>
  <!-- End Navbar -->

  <div class="container-fluid py-4">
    <div class="d-sm-flex justify-content-between">
      <div class="col-auto ms-auto">
        <button class="btn btn-icon bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#import">
          +&nbsp;Novo Recurso Mineral
        </button>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header pb-0">
            <div class="d-lg-flex">
              <div>
                <h5 class="mb-0">
                  <a href="<?= DIRPAGE; ?>painel-admin" class="btn text-secondary mb-md-0 px-2 py-1 me-2" type="button" style="border-radius: 100%" name="button"><i class="fa fa-arrow-left fa-2x"></i></a>
                  <?= $params['breadcrumb'][count($params['breadcrumb']) - 1]; ?>
                </h5>
                <p class="text-sm mb-0">Exibição de todos os registros.</p>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-0">
            <div class="table-responsive">
              <table class="table table-flush" style="overflow: hidden;" id="products-list">
                <thead class="thead-light">
                  <tr>
                    <th>Recurso Mineral</th>
                    <th>Tipo de Mineral</th>
                    <th>Tom de Cor Do Mineral</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($params['recursos'] as $key): ?>
                  <tr class="coluna">
                    <td >
                      <div class="d-flex">
                        <h6 class="ms-3 my-auto">
                        <?php 
                          if($key['nome_mineral'] != '')
                          {
                            echo $key['nome_mineral'];
                          }else {
                            echo 'Nâo Disponivel';
                          }
                        ?>
                        </h6>
                      </div>
                    </td>
                    <td >
                      <?php 
                        if($key['tipo_mineral'] != '')
                        {
                          echo $key['tipo_mineral'];
                        }else {
                          echo 'Nâo Disponivel';
                        }
                      ?>
                    </td>
                    <td >
                      <?php 
                        if($key['cor_mineral'] != '')
                        {
                          echo '<span class="badge p-2 mt-2 d-block" style="background: '.$key['cor_mineral'].'"> </span>';
                        }else {
                          echo 'Nâo Disponivel';
                        }
                      ?>
                    <td class="action">
                      <a href="<?= DIRPAGE; ?>painel-admin/recursos/edit" class="mx-3 edit" data-bs-toggle="tooltip" data-bs-original-title="Editar Recurso Mineral">
                        <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                      </a>
                      <a href="painel-admin/recursos/edit" class="delete" data-bs-toggle="tooltip" data-bs-original-title="Deletar Reccurso Mineral">
                        <i class="material-icons text-secondary position-relative text-lg">delete</i>
                      </a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Recurso Mineral</th>
                    <th>Tipo de Mineral</th>
                    <th>Tom de Cor Do Mineral</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include_once(DIRREQ.'/app/view/include/footer.php'); ?>
  </div>
</main>