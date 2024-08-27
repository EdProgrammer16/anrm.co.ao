<main class="position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
      <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0">
        <img src="<?= DIRIMG; ?>arnm2.png" class="navbar-brand-img me-2" style="width: 56px" alt="main_logo">
          Página de Início
        </h6>
      </nav>
      <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <ul class="navbar-nav justify-content-end ms-md-auto">
          <?php if(isset($params['usuario'])): ?>
            <li class="nav-item d-flex align-items-center">
              <a href="<?= DIRPAGE; ?>sign-in" class="nav-link text-body font-weight-bold px-0">
              <i class="material-icons me-sm-1" style="display: inline-block; top: 5px; position: relative">account_circle</i>
                <span class="d-sm-inline d-none"><?= $params['usuario'][0]['usuario_email']; ?></span>
              </a>
            </li>
          <?php else: ?>
            <li class="nav-item d-flex align-items-center">
              <a href="<?= DIRPAGE; ?>sign-in" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Sign In</span>
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->