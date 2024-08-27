<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y">
  <!-- Navbar -->
  <?php include_once(DIRREQ.'/app/view/include/navbar.php'); ?>
  <!-- End Navbar -->

  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-lg-6">
        <h3 class="text-uppercase">Usuários</h3>
      </div>
      <div class="col-lg-6 text-right d-flex align-items-end">
        <a href="<?= DIRPAGE; ?>novo/usuario" class="btn btn-icon bg-gradient-primary ms-auto">
          +&nbsp;Novo Usuário
        </a>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12">
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
                    <th>Nome do Usuário</th>
                    <th>Email do Usuário</th>
                    <th>Identidade do Usuário</th>
                    <th>Nivel de Permissão</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($params['usuarios'] as $key): if($params['usuario'][0]['usuario_id'] != $key['usuario_id']): ?>
                  <tr class="coluna">
                    <td>
                      <div class="d-flex">
                        <div class="form-check my-auto">
                          <input class="form-check-input" type="checkbox" id="<?= $key['usuario_id']; ?>">
                        </div>
                    </div>
                    </td>
                    <td class="linha">
                      <a href="<?= DIRPAGE; ?>usuarios/ver/<?= $key['usuario_id'] ?>" class="d-flex">
                        <h6 class="ms-3 my-auto">
                        <?php 
                          if($key['usuario_nome'] != '')
                          {
                            echo $key['usuario_nome'];
                          }else {
                            echo 'Nâo Disponivel';
                          }
                        ?>
                        </h6>
                        </a>
                    </td>
                    <td class="linha">
                      <a href="<?= DIRPAGE; ?>usuarios/ver/<?= $key['usuario_id'] ?>" class="d-flex text-dark">
                      <?php 
                        if($key['usuario_email'] != '')
                        {
                          echo $key['usuario_email'];
                        }else {
                          echo 'Nâo Disponivel';
                        }
                      ?>
                      </a>
                    </td>
                    <td class="linha">
                      <a href="<?= DIRPAGE; ?>usuarios/ver/<?= $key['usuario_id'] ?>" class="d-flex text-dark">
                      <?php 
                        if($key['usuario_bi'] != '')
                        {
                          echo $key['usuario_bi'];
                        }else {
                          echo 'Nâo Disponivel';
                        }
                      ?>
                      </a>
                    <td class="linha">
                      <a href="<?= DIRPAGE; ?>usuarios/ver/<?= $key['usuario_id'] ?>" class="d-block text-dark">
                      <?php 
                        if($key['usuario_perm'] != '')
                        {
                          switch($key['usuario_perm']) {
                            case 'admin':
                              echo 'Administrador';
                              break;
                            case 'moder':
                              echo 'Técnico';
                              break;
                            case 'normal':
                              echo 'Normal';
                              break;
                            default:
                              echo 'Nâo Disponivel';
                          }
                        }else {
                          echo 'Nâo Disponivel';
                        }
                      ?>
                      </a>
                    </td>
                    <td class="action">
                      <a href="javascript:;" class="mx-3 edit" data-bs-toggle="tooltip" data-bs-original-title="Edit product" data-id="<?= $key['usuario_id']; ?>">
                        <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                      </a>
                      <a href="javascript:;" class="delete" data-bs-toggle="tooltip" data-bs-original-title="Delete product" data-id="<?= $key['usuario_id']; ?>">
                        <i class="material-icons text-secondary position-relative text-lg">delete</i>
                      </a>
                    </td>
                  </tr>
                  <?php else: ?>
                    <tr class="coluna bg-gradient-light">
                      <td>
                        <div class="d-flex">
                          <div class="form-check my-auto">
                            <input class="form-check-input" type="checkbox" id="<?= $key['usuario_id']; ?>">
                          </div>
                        </div>
                      </td>
                      <td class="linha">
                        <a href="<?= DIRPAGE; ?>perfil" class="d-flex">
                          <h6 class="ms-3 my-auto">
                          <?php 
                            if($key['usuario_nome'] != '')
                            {
                              echo $key['usuario_nome'];
                            }else {
                              echo 'Nâo Disponivel';
                            }
                          ?>
                          </h6>
                          </a>
                      </td>
                      <td class="linha">
                        <a href="<?= DIRPAGE; ?>perfil" class="d-flex text-dark">
                        <?php 
                          if($key['usuario_email'] != '')
                          {
                            echo $key['usuario_email'];
                          }else {
                            echo 'Nâo Disponivel';
                          }
                        ?>
                        </a>
                      </td>
                      <td class="linha">
                        <a href="<?= DIRPAGE; ?>perfil" class="d-flex text-dark">
                        <?php 
                          if($key['usuario_bi'] != '')
                          {
                            echo $key['usuario_bi'];
                          }else {
                            echo 'Nâo Disponivel';
                          }
                        ?>
                        </a>
                      </td>
                      <td class="linha">
                        <a href="<?= DIRPAGE; ?>perfil" class="d-block text-dark">
                        <?php 
                          if($key['usuario_perm'] != '')
                          {
                            switch($key['usuario_perm']) {
                              case 'admin':
                                echo 'Administrador';
                                break;
                              case 'moder':
                                echo 'Técnico';
                                break;
                              case 'normal':
                                echo 'Sem Permissão';
                                break;
                              default:
                                echo 'Nâo Disponivel';
                            }
                          }else {
                            echo 'Nâo Disponivel';
                          }
                        ?>
                        </a>
                      </td>
                      <td class="action">
                        <a href="javascript:;" class="mx-3 edit" data-bs-toggle="tooltip" data-bs-original-title="Edit product" data-id="<?= $key['usuario_id']; ?>">
                          <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                        </a>
                      </td>
                    </tr>
                  <?php 
                    endif; 
                    endforeach; 
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Action</th>
                    <th>Denominação</th>
                    <th>Título Mineral</th>
                    <th>Provincia</th>
                    <th>Estado Do Projecto</th>
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