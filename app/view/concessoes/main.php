<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ps--active-y">
  <!-- Navbar -->
  <?php include_once(DIRREQ.'/app/view/include/navbar.php'); ?>
  <!-- End Navbar -->

  <div class="container-fluid py-4">
    <div class="row mt-4">
      <div class="col-lg-6">
        <h3 class="text-uppercase">Concessôes</h3>
      </div>
      <div class="col-lg-6 text-right d-flex align-items-end">
        <?php if($params['usuario'][0]['usuario_perm'] == 'superadmin' || $params['usuario'][0]['usuario_perm'] == 'admin' || $params['usuario'][0]['usuario_perm'] == 'moder'): ?>
          <a href="<?= DIRPAGE; ?>novo/csv" class="btn btn-icon bg-gradient-success ms-auto">
            +&nbsp;Importar CSV
          </a>
          <a href="<?= DIRPAGE; ?>novo/concessao" class="btn btn-icon bg-gradient-primary ms-3">
            +&nbsp;Nova Concessão
          </a>
        <?php endif; ?>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-12">
        <?php include_once(DIRREQ.'/app/view/include/table_minas.php'); ?>
      </div>
    </div>
    <?php include_once(DIRREQ.'/app/view/include/footer.php'); ?>
  </div>
</main>