<style>
  .dataTable-input {
    background-image: linear-gradient(195deg,#ebeff4,#ced4da);
  }
  .coluna {
    transition: .4s all;
  }
  .coluna:hover {
    box-shadow: 0 10px 15px -3px rgba(0,0,0,.1),0 4px 6px -2px rgba(0,0,0,.05)!important;
    transform: scale(1.03);
    z-index: 9999;
  }
  .action {
    visibility: hidden;
    transition: .4s all;
  }
  .coluna:hover .action {
    visibility: visible;
  }
  .linha {
    cursor: pointer;
  }
</style>
<div class="card">
  <div class="card-header pb-0">
    <div class="d-lg-flex">
      <div>
        <h5 class="mb-0">
          <!-- <a href="<?= DIRPAGE; ?>dashboard" class="btn text-secondary mb-md-0 px-2 py-1 me-2" type="button" style="border-radius: 100%" name="button"><i class="fa fa-arrow-left fa-2x"></i></a> -->
          <?= $params['breadcrumb'][count($params['breadcrumb']) - 1]; ?>
        </h5>
      </div>
    </div>
  </div>
  <div class="card-body px-0 pb-0">
    <div class="table-responsive">
      <table class="table table-flush" style="overflow: hidden;" id="products-list">
        <thead class="thead-light">
          <tr>
            <th>Action</th>
            <th>Denominação</th>
            <th>Título Mineral</th>
            <th>Provincia</th>
            <th>Situação Operacional</th>
            <?php if($params['usuario'][0]['usuario_perm'] == 'superadmin' || $params['usuario'][0]['usuario_perm'] == 'admin' || $params['usuario'][0]['usuario_perm'] == 'moder'): ?>
            <th>Action</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php foreach($params['concessoes'] as $key): ?>
          <tr class="coluna">
            <td>
              <div class="d-flex">
                <div class="form-check my-auto">
                  <input class="form-check-input" type="checkbox" id="<?= $key['id']; ?>">
                </div>
            </div>
            </td>
            <td class="linha">
              <a href="<?= DIRPAGE; ?>concessoes/ver/<?= $key['id'] ?>" class="d-flex">
                <h6 class="ms-3 my-auto">
                <?php 
                  if($key['denominacao'] != '')
                  {
                    echo $key['denominacao'];
                  }else {
                    echo 'Nâo Disponivel';
                  }
                ?>
                </h6>
                </a>
            </td>
            <td class="linha">
              <a href="<?= DIRPAGE; ?>concessoes/ver/<?= $key['id'] ?>" class="d-flex text-dark">
              <?php 
                if($key['titulo_mineral'] != '')
                {
                  echo $key['titulo_mineral'];
                }else {
                  echo 'Nâo Disponivel';
                }
              ?>
              </a>
            </td>
            <td class="linha">
              <a href="<?= DIRPAGE; ?>concessoes/ver/<?= $key['id'] ?>" class="d-flex text-dark">
              <?php 
                if($key['provincia'] != '')
                {
                  echo $key['provincia'];
                }else {
                  echo 'Nâo Disponivel';
                }
              ?>
              </a>
            <td class="linha">
              <a href="<?= DIRPAGE; ?>concessoes/ver/<?= $key['id'] ?>" class="d-block text-dark">
                <?php 
                  if($key['estado_projecto'] != '')
                  {
                    switch($key['estado_projecto']){
                      case 'Operante':
                        echo '<span class="badge badge-success d-block">';
                        echo $key['estado_projecto'];
                        echo '</span>';
                      break;
                      case 'Inoperante':
                        echo '<span class="badge badge-primary d-block">';
                        echo $key['estado_projecto'];
                        echo '</span>';
                      break;
                      case 'Suspeção':
                        echo '<span class="badge badge-warning d-block">';
                        echo $key['estado_projecto'];
                        echo '</span>';
                      break;
                      case 'Extinto':
                        echo '<span class="badge badge-secondary d-block">';
                        echo $key['estado_projecto'];
                        echo '</span>';
                      break;
                    }
                  }else {
                    echo 'Nâo Disponivel';
                  }
                ?>
              </a>
            </td>
            <?php if($params['usuario'][0]['usuario_perm'] == 'superadmin' || $params['usuario'][0]['usuario_perm'] == 'admin' || $params['usuario'][0]['usuario_perm'] == 'moder'): ?>
              <td class="action">
                <a href="javascript:;" class="mx-3 edit" data-bs-toggle="tooltip" data-bs-original-title="Edit product" data-id="<?= $key['id']; ?>">
                  <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                </a>
                <a href="javascript:;" class="delete" data-bs-toggle="tooltip" data-bs-original-title="Delete product" data-id="<?= $key['id']; ?>">
                  <i class="material-icons text-secondary position-relative text-lg">delete</i>
                </a>
              </td>
            <?php endif; ?>
          </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th>Action</th>
            <th>Denominação</th>
            <th>Título Mineral</th>
            <th>Provincia</th>
            <th>Estado Do Projecto</th>
            <?php if($params['usuario'][0]['usuario_perm'] == 'superadmin' || $params['usuario'][0]['usuario_perm'] == 'admin' || $params['usuario'][0]['usuario_perm'] == 'moder'): ?>
            <th>Action</th>
            <?php endif; ?>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>