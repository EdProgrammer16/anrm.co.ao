<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y">
  <!-- Navbar -->
  <?php include_once(DIRREQ.'/app/view/include/navbar.php'); ?>
  <!-- End Navbar -->

  <div class="container-fluid my-3 py-3">
    <div class="row mb-5">
      <div class="col-lg-5 mx-auto mt-lg-0 mt-4">
      <?php foreach($params['ver_usuario'] as $key): ?>
        <form class="card mt-4 form" id="basic-info" method="post" action="<?= DIRPAGE; ?>usuarios/edit/<?= $key['usuario_id']?>">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
              <h4 class="text-white font-weight-bolder text-center mt-2">
                <a href="<?= DIRPAGE; ?>painel-admin/usuarios" class="btn text-white mb-md-0 px-2 py-1 me-2" type="button" style="border-radius: 100%" name="button"><i class="fa fa-arrow-left fa-2x"></i></a>
                <i class="fa fa-user"></i> Editar Perfil de <?= $key['usuario_nome']; ?>
              </h4>
            </div>
          </div>
          <div class="card-body pt-0 mt-5">
            <!-- =-==========================-->
            <div class="row mb-5">
              <div class="col-12 col-md-6">
                <div class="input-group input-group-static">
                  <label class="mb-0 h6" for="uNome">
                    Nome
                  </label>
                  <input name="uNome" id="uNome" class="form-control h6 fw-normal mb-0" value="<?= $key['usuario_nome']; ?>">
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="input-group input-group-static">
                  <label class="mb-0 h6" for="uEmail">
                    E-Mail
                  </label>
                  <input name="uEmail" id="uEmail" class="form-control h6 fw-normal mb-0" value="<?= $key['usuario_email']; ?>">
                </div>
              </div>
            </div>
            <!-- =-==========================-->
            <div class="row mb-5">
              <div class="col-12 col-md-6">
                <div class="input-group input-group-static">
                  <label class="mb-0 h6" for="uBI">
                    Identidade
                  </label>
                  <input name="uBI" id="uBI" class="form-control h6 fw-normal mb-0" value="<?= $key['usuario_bi']; ?>">            
                </div>
              </div>
              <div class="col-12 col-md-6">
                <div class="input-group input-group-static">
                  <label class="mb-0 h6" for="usuario_perm">
                    Nivél De Permissão
                  </label>
                  <select id="uPerm" name="uPerm" class="form-control">
                    <?php if($key['usuario_perm'] == 'admin'): ?>
                      <option value="admin" select>Adminnistrador</option>
                      <option value="normal">Normal</option>
                      <option value="moder" >Técnico</option>
                    <?php elseif($key['usuario_perm'] == 'normal'): ?>
                      <option value="normal" select>Normal</option>
                      <option value="moder">Técnico</option>
                      <option value="admin">Adminnistrador</option>
                    <?php elseif($key['usuario_perm'] == 'moder'): ?>
                      <option value="moder" select>Técnico</option>
                      <option value="normal" >Normal</option>
                      <option value="admin">Adminnistrador</option>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
            </div>
            <!-- =-==========================-->
            <!-- =-==========================-->
            <div class="row mb-5">
              <div class="col-12">
                <div class="input-group input-group-static">
                <a href="<?= DIRPAGE; ?>usuarios/password/<?= $key['usuario_id']; ?>" class="btn btn-outline-primary mb-3 mb-md-0 ms-auto">Alter Senha</a>
                  <button name="uSubmit" id="uSubmit" class="btn btn-sm bg-gradient-primary mb-0 ms-2">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      <?php endforeach; ?>
      </div>
    </div>
  </div>
  <?php include_once(DIRREQ.'/app/view/include/footer.php'); ?>
</div>
</main>