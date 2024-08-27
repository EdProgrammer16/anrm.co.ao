<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y">
  <!-- Navbar -->
  <?php include_once(DIRREQ.'/app/view/include/navbar.php'); ?>
  <!-- End Navbar -->

  <div class="container-fluid py-3">
    <div class="row">
      <div class="col-lg-6">
        <a href="<?= DIRPAGE; ?>usuarios" class="text-dark mb-md-0" type="button" style="border-radius: 100%" name="button">
          <h3 class="text-uppercase">
            <i class="fa fa-arrow-left"></i>
            Visualizar Usuário
          </h3>
        </a>
      </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-8 col-lg-6 col-sm-10 col-12 mx-auto">
          <?php foreach($params['ver_usuario'] as $key): ?>
          <div class="card card-plain p-5 shadow">
            <div class="card-header pb-0 p-3 bg-transparent">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h4 class="mb-0">Informação do Usuário</h4>
                </div>
                <div class="col-md-4 text-end">
                  <a href="<?= DIRPAGE; ?>usuarios/edit/<?= $key['usuario_id'];?>">
                    <i class="fas fa-user-edit text-secondary text-lg" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Editar Usuário" data-bs-original-title="Editar Usuário"></i>
                    <span class="sr-only">Editar Usuário</span>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <div class="row border-bottom pb-2 mt-5">
                <div class="col-sm-6 text-lg text-uppercase">
                  <strong class="text-dark">Nome do Usuário:</strong>
                </div>
                <div class="col-sm-6 text-lg"> 
                  <?= $key['usuario_nome']; ?>
                </div>
              </div>
              <!-- ===================================== -->
              <div class="row border-bottom pb-2 mt-4">
                <div class="col-sm-6 text-lg text-uppercase">
                  <strong class="text-dark">E-mail do Usuário:</strong>
                </div>
                <div class="col-sm-6 text-lg"> 
                  <?= $key['usuario_email']; ?>
                </div>
              </div>
              <!-- ===================================== -->
              <div class="row border-bottom pb-2 mt-4">
                <div class="col-sm-6 text-lg text-uppercase">
                  <strong class="text-dark">Identidade do Usuário:</strong>
                </div>
                <div class="col-sm-6 text-lg"> 
                  <?= $key['usuario_bi']; ?>
                </div>
              </div>
              <!-- ===================================== -->
              <div class="row border-bottom pb-2 mt-4">
                <div class="col-sm-6 text-lg text-uppercase">
                  <strong class="text-dark">Nivel de Permissão:</strong>
                </div>
                <div class="col-sm-6 text-lg"> 
                  <?php
                  if($key['usuario_perm'] != '')
                  {
                    switch($key['usuario_perm']) {
                      case 'admin':
                        echo 'Administrador';
                        break;
                      case 'normal':
                        echo 'Sem Permissão';
                        break;
                      case 'moder':
                        echo 'Técnico';
                        break;
                      default:
                        echo 'Nâo Disponivel';
                    }
                  }else {
                    echo 'Nâo Disponivel';
                  } 
                   ?>
                </div>
              </div>
              <!-- ===================================== -->
              <div class="row border-bottom pb-2 mt-4">
                <div class="col-sm-6 text-lg text-uppercase">
                  <strong class="text-dark">Data de Registro:</strong>
                </div>
                <div class="col-sm-6 text-lg"> 
                  <?php
                  if($key['usuario_perm'] != '')
                  {
                   echo $key['usuario_dataCri'];
                  }else {
                    echo 'Nâo Disponivel';
                  } 
                   ?>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
    </div>  
    <?php include_once(DIRREQ.'/app/view/include/footer.php'); ?>
  </div>
</main>