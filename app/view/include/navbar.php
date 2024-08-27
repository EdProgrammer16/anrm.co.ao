<nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
  <div class="container-fluid py-1 px-3">
    <h6 class="font-weight-bolder mb-0 me-3">
      <?php  
            for($i = 0; $i < count($params['breadcrumb']); $i++): ?>
              <?php if($i+1 < count($params['breadcrumb'])): ?>
                <a href="javascript:;" class="nav-link text-body p-0 d-inline-block"><?= $params['breadcrumb'][$i]; ?></a> / 
                <!-- <a href="javascript:;" class="nav-link text-body p-0 d-inline-block">Novo</a> / <br/> -->
                <?php elseif(count($params['breadcrumb']) < 2): echo $params['breadcrumb'][$i]; ?>
                <?php else: echo '<br/>'.$params['breadcrumb'][$i]; ?>
              <?php endif; ?>
      <?php endfor; ?>
    </h6>
    <div class ="sidenav-toggler sidenav-toggler-inner d-xl-block d-none"> 
      <a href="javascript:;" class="nav-link text-body p-0">
          <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
          </div>
      </a> 
    </div>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <div class="ms-md-auto pe-md-3 d-flex align-items-center">
        <div class="input-group input-group-outline">
          <form method="post" action="<?= DIRPAGE; ?>dashboard/search" class="input-group input-group-outline">
            <label class="form-label">Pesquisar...</label>
            <input type="text" id="search" name="search" class="form-control">
          </form>
        </div>
      </div>
      <ul class="navbar-nav justify-content-end">
        <?php if(isset($params['usuario'])): ?>
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
              <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i >
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
              </div>
            </a>
          </li>
          <li class="nav-item dropdown pe-2">
            <a
              href="javascript:;"
              class="nav-link text-body p-0 position-relative d-flex"
              id="dropdownMenuButton"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <h6><?= $params['usuario'][0]['usuario_email']; ?></h6>
              <i class="material-icons cursor-pointer" style="font-size: 1.5rem;">account_circle</i>
              <span class="small position-absolute top-5 translate-middle badge rounded-pill bg-danger border border-white visually-hidden" style="left: 90%!important;padding: .3rem">
                <span class="visually-hidden">unread notifications</span>
              </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end p-2 me-sm-n4" aria-labelledby="dropdownMenuButton">
              <!-- <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="<?= DIRPAGE; ?>perfil/">
                  <div class="d-flex align-items-center py-1">
                    <span class="material-icons">account_circle</span>
                    <div class="ms-2 mt-1">
                      <h6 class="text-sm font-weight-normal my-auto">Perfil</h6>
                    </div>
                  </div>
                </a>
              </li>
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex align-items-center py-1">
                    <span class="material-icons">email</span>
                    <div class="ms-2">
                      <h6 class="text-sm font-weight-normal my-auto">Mensagens</h6>
                    </div>
                  </div>
                </a>
              </li>
              <li class="mb-2">
                <a class="dropdown-item border-radius-md" href="javascript:;">
                  <div class="d-flex align-items-center py-1">
                    <span class="material-icons">notifications</span>
                    <span class="small position-absolute top-1 start-10 badge rounded-pill bg-danger border border-white small p-1">
                      9+
                      <span class="visually-hidden">unread notifications</span>
                    </span>
                    <div class="ms-2">
                      <h6 class="text-sm font-weight-normal my-auto">
                        Notificações
                      </h6>
                    </div>
                  </div>
                </a>
              </li> -->
              <li>
                <a class="dropdown-item border-radius-md" href="<?= DIRPAGE; ?>/logout">
                  <div class="d-flex align-items-center py-1 text-primary">
                    <span class="material-icons">logout</span>
                    <div class="ms-2">
                      <h6 class="text-primary text-sm font-weight-normal my-auto">Terminar Sessão</h6>
                    </div>
                  </div>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="javascript:;" class="nav-link text-body p-0">
              <i  style="font-size: 1.5rem;" class="material-icons fixed-plugin-button-nav cursor-pointer">settings</i>
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